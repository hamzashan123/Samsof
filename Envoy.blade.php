@servers(['local' => '127.0.0.1', 'production' => 'ubuntu@41.79.78.182 -p 5252', 'staging' => 'ubuntu@demos.mycology.co.za -p 5252'])

@setup
    $repo = 'git@bitbucket.org:mycalturedev/sasmfos-app.git';

    $stagingBranch = 'develop';

    $productionBranch = 'master';

    date_default_timezone_set('Africa/Johannesburg');
    $date = date('YmdHis');

    $appDir = '/opt/sasmfos/website';

    $buildsDir = $appDir . '/sources';

    $deploymentDir = $buildsDir . '/' . $date;

    $serve = $appDir . '/source';
    $env = $appDir . '/.env';
    $storage = $appDir . '/storage';
@endsetup

@task('build', ['on' => 'local'])
    yarn prod
@endtask

@task('deployment', ['on' => 'production'])
    git clone -b {{ $productionBranch }} "{{ $repo }}" {{ $deploymentDir }}
@endtask

@task('install', ['on' => 'production'])
    cd {{ $deploymentDir }}

    rm -rf {{ $deploymentDir }}/storage

    ln -nfs {{ $env }} {{ $deploymentDir }}/.env

    ln -nfs {{ $storage }} {{ $deploymentDir }}/storage

    composer install --prefer-dist --no-dev -o

    php ./artisan migrate --force

    sudo systemctl restart php7.3-fpm
@endtask

@task('assets', ['on' => 'local'])
    scp -P5252 -rq public/css ubuntu@41.79.78.182:{{ $deploymentDir }}/public
    scp -P5252 -rq public/js ubuntu@41.79.78.182:{{ $deploymentDir }}/public
    scp -P5252 -q public/mix-manifest.json ubuntu@41.79.78.182:{{ $deploymentDir }}/public
@endtask

@task('live', ['on' => 'production'])
    ln -nfs {{ $deploymentDir }} {{ $serve }}
@endtask

@task('deploydemo', ['on' => 'staging'])
    cd /opt/mycalture/mycology.co.za/demos/sasmfos/source

    php ./artisan down

    git pull

    composer install --prefer-dist --no-dev

    php ./artisan migrate --force

    php ./artisan up
@endtask

@task('demoassets', ['on' => 'local'])
    scp -P5252 -rq public/css ubuntu@demos.mycology.co.za:/opt/mycalture/mycology.co.za/demos/sasmfos/source/public
    scp -P5252 -rq public/js ubuntu@demos.mycology.co.za:/opt/mycalture/mycology.co.za/demos/sasmfos/source/public
    scp -P5252 -q public/mix-manifest.json ubuntu@demos.mycology.co.za:/opt/mycalture/mycology.co.za/demos/sasmfos/source/public
@endtask

@story('deploy')
    build
    deployment
    install
    assets
    live
@endstory

@story('demo')
    build
    deploydemo
    demoassets
@endstory

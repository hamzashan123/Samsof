<?php

use Illuminate\Database\Seeder;
use App\Release;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $imageManager = new ImageManager([
            'driver' => 'imagick'
        ]);

        factory(Release::class, 10)->create()->each(function ($release) use ($faker, $imageManager) {
            $path = $this->getReleaseImagesDirectory($release);
            if (!file_exists($path . '/cover.jpg')) {
                $image = $faker->image(storage_path('app/images/releases'), 1000, 800);
                rename($image, $path . '/cover.jpg');
            }
        });
    }

    protected function getReleaseImagesDirectory(Release $release)
    {
        if (!file_exists($path = storage_path('app/images/releases/' . $release->id))) {
            mkdir($path);
        }
        return $path;
    }
}

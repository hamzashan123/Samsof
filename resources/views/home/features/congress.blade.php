<div class="columns is-gapless is-hidden-mobile">
    <div class="column">
        <div class="columns is-gapless is-mobile">
            <div class="column is-5 congress-banner-background">
            </div>
            <div class="column is-4 yellow-bg has-text-white">
                <div class="p-2 has-text-centered-touch">
                    <h1 class="title is-3 is-uppercase has-text-white">SASMFOS<br>Congress 2020</h1>
                    <p class="is-size-6">
                        We are delighted to invite delegates and exhibitors to our annual SASMFOS Congress in 2020. The
                        congress week will take place from 16 to 21 August in Cape Town, South Africa.
                    </p>
                </div>
            </div>
            <div class="column dark-yellow-bg is-flex">
                <div class="p-2 align-bottom">
                    <a href="{{ route('congress') }}" class="button is-warning is-rounded is-uppercase"><strong>FIND OUT MORE</strong></a>
                </div>
            </div>
        </div>
    </div>
    @include('home.partials.right-sidebar')
</div>

<div class="columns is-gapless is-hidden-tablet">
    <div class="column">
        <div class="columns is-gapless">
            <div class="column is-5 join-us-background is-hidden-mobile">
            </div>
            <div class="column red-bg has-text-white">
                <div class="p-2 has-text-centered-touch">
                    <h1 class="title is-3 is-uppercase has-text-white">Private Public Initiatives</h1>
                    <p class="is-size-6">SASMFOS puts patients first. We assist patients in the public sector and those who are economically challenged to access first-class specialist medical services. </p>
                </div>
            </div>
            <div class="column dark-red-bg has-text-white pb-2 has-text-centered-touch">
                <a href="{{ route('cares') }}" class="button is-danger is-rounded is-uppercase mt-3 mb-3"><strong>SASMFOS Cares</strong></a>
            </div>
        </div>
    </div>
</div>

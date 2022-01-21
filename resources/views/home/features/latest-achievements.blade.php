<div class="columns is-gapless is-relative">
    <div class="column">
        <section class="quotation-container">
            <div class="container content-container-less-right">
                <div class="columns align-center">
                    <div class="column is-4"></div>
                    <div class="column has-text-centered-touch">
                        <div class="pl-3-desktop-up">
                            <h3 class="title is-3 is-uppercase has-text-white">latest achievements<br>& videos</h3>
                        </div>
                    </div>
                    <div class="column">
                        <div class="columns align-center">
                            <div class="column is-3 pl-4">
                            </div>
                            <div class="column has-text-centered">
                                <div class="white-horizontal-line"></div>
                            </div>
                            <div class="column is-narrow has-text-right has-text-centered-touch pl-2-desktop-up">
                                <img src="/images/icons/achievements-icon.png" alt="Achievements Icon" class="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('home.partials.right-sidebar')
</div>
<div class="achievements-container pt-4">
    <div class="overlay">
        <div class="container pull-up content-container-less-right pt-4 pb-4">
            <div class="columns">
                @include('home.features.achievements.media')
                <div class="column is-2"></div>
                <div class="column is-3 is-relative achievements-home">
                    @include('home.features.achievements.announcements')
                </div>
            </div>
        </div>
    </div>
</div>

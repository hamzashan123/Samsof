@extends('layouts.master', ['footerSidebar' => false])
@section('title', '2020 Congress Programme')
@section('content')
    <navigator active="conference"></navigator>
    <page-banner src="{{ asset('images/banners/conference.jpg') }}"
                 :mist-overlay="false"
                 :negative-shift="false"
                 :parallax="false"
                 placement-X="25%">
        <template v-slot:title>
            <span>SASMFOS</span> <br>
            Congress <br>
            2020<br>Programme
        </template>
    </page-banner>
    <div class="container">
        <section class="page-section">
            <div class="columns">
                <div class="column is-5 is-offset-1">
                    <div class="page-section-body has-background-white-ter has-border-radius-top-left p-2 content">
                        <h2>More information coming soon.</h2>
                        <p>
                            We are currently finalizing the programme for the 2020 SASMFOS Congress. Please check back
                            soon for updates, or join our mailing list and be notified when registrations are open.
                        </p>

                    </div>
                </div>
            </div>
        </section>
        <section class="page-section mb-6">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="conference-buttons">
                        <a href="https://mailchi.mp/stone.consulting/sasmfoscongress2020" class="button is-rounded is-danger is-uppercase" target="_blank"><strong>Subscribe to receive regular updates</strong></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Congress')
@section('content')
    <navigator active="conference"></navigator>
    <page-banner src="{{ asset('images/banners/conference.jpg') }}" :breadcrumb="null"
                 :mist-overlay="false"
                 :negative-shift="false"
                 :parallax="false"
                 placement-X="25%">
        <template v-slot:title>
            <span>SASMFOS</span> <br>
            Congress <br>
            2020<br>
            <span style="color: red">Postponed</span>
        </template>
    </page-banner>

{{--    <floating-image src="{{ asset('images/content/clip-board.png?v=3') }}" alt="Tools" distance="300px" image-width="40%"></floating-image>--}}
    <floating-image src="{{ asset('images/content/stethoscope.png') }}" alt="Tools" distance="300px" image-width="30%"></floating-image>

    <div class="container">
        <section class="page-section">
            <div class="columns">
                <div class="column is-5 is-offset-1">
                    <div class="page-section-body has-background-white-ter has-border-radius-top-left p-2">
                        <h3><strong class="has-text-primary">SASMFOS Congress 2020 and Covid-19</strong></h3>
                        <p>
                            Taking these factors into consideration, EXCO has taken the unprecedented decision to cancel
                            the SASMFOS Congress, which was initially planned to take place in August, in partnership
                            with the Indian Association. We have furthermore decided to suspend all EXCO meetings until
                            further notice.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section mb-6">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="conference-buttons">
                        <a href="mailto:info@sasmfos.org?cc=sasmfos@stone.consulting" class="button is-rounded is-danger is-uppercase" target="_blank"><strong>Email Us</strong></a>
                        <a href="https://us18.campaign-archive.com/?u=870dc395b3b48cb3b74bba582&id=ad43b95607" class="button is-rounded is-warning is-uppercase" target="_blank"><strong>Member Announcement</strong></a>
                        <a href="https://sacoronavirus.co.za" class="button is-rounded is-success is-uppercase" target="_blank"><strong>Visit the South African Coronavirus portal</strong></a>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <div class="page-section-body">
                        <div class="columns">
                            <div class="column">
                                <hr>
                                <div class="conference-buttons">
{{--                                    <a href="https://mailchi.mp/stone.consulting/sasmfoscongress2020" class="button is-rounded is-danger is-uppercase" target="_blank"><strong>Sign up</strong></a>--}}
                                    {{--                        <a href="https://congress.sasmfos.org/programme.htm" class="button is-rounded is-info is-uppercase" target="_blank"><strong>Latest announcement</strong></a>--}}
                                    <a href="https://www.facebook.com/sasmfos" class="button is-rounded is-facebook is-uppercase" target="_blank">
                                        <fa :icon="['fab', 'facebook-f']" fixed-width></fa>
                                        <strong>Facebook</strong>
                                    </a>
                                    <a href="https://www.twitter.com/@sasmfos" class="button is-rounded is-twitter is-uppercase" target="_blank">
                                        <fa :icon="['fab', 'twitter']" fixed-width></fa>
                                        <strong>Twitter</strong>
                                    </a>
                                    <a href="https://www.linkedin.com/company/sasmfos" class="button is-rounded is-linkedin is-uppercase" target="_blank">
                                        <fa :icon="['fab', 'linkedin']" fixed-width></fa>
                                        <strong>LinkedIn</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column has-text-right is-hidden-mobile">
                    {{-- <img src="/images/content/stethoscope.png" class="stethoscope-img"> --}}
                </div>
            </div>
        </section>
    </div>

@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.cloud.key') }}"></script>
@endsection

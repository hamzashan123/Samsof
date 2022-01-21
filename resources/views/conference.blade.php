@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Congress')
@section('content')
    <navigator active="conference"></navigator>
    <page-banner src="{{ asset('images/banners/conference.jpg') }}" :breadcrumb="['Home']"
                 :mist-overlay="false"
                 :negative-shift="false"
                 :parallax="false"
                 placement-X="25%">
        <template v-slot:title>
            <span>SASMFOS</span> <br>
            Congress<br>
            2020
        </template>
    </page-banner>

    <floating-image src="{{ asset('images/content/clip-board.png') }}" alt="Tools" distance="300px" image-width="40%"></floating-image>
    <floating-image src="{{ asset('images/content/stethoscope.png') }}" alt="Tools" distance="1200px" image-width="30%"></floating-image>

    <div class="container">
        <section class="page-section">
            <div class="columns">
                <div class="column is-5 is-offset-1">
                    <div class="page-section-body has-background-white-ter has-border-radius-top-left p-2">
                        <h3><strong class="has-text-primary">A message from the SASMFOS President</strong></h3>
                        <p>
                            We are delighted to invite delegates to our annual SASMFOS Congress in 2020. The congress
                            week will take place from 16 to 21 August in Cape Town, South Africa. Be sure to register
                            early to secure your space and receive a special discounted rate.
                        </p>
                        <p>
                            <strong>16 – 18 August, SASMFOS Congress 2020 Workshops:</strong>
                        </p>
                        <p>
                            Cadaver Aesthetics Workshop, Sunskills Laboratory, Department of Anatomy Tygerberg Medical
                            Campus, Cape Town
                        </p>
                        <div class="content">
                            <ul>
                                <li>
                                    <strong>Course 1:</strong> Aesthetics for dentists and general practitioners, 16 August
                                </li>
                                <li>
                                    <strong>Course 2:</strong> Surgical aesthetics for specialist surgeons, 17 – 18 August
                                </li>
                            </ul>
                        </div>
                        <p>
                            Temporomandibular Joint (TMJ) and Transorbital and Endoscopic Surgery Workshops, Red Cross
                            War Memorial Children’s Hospital, Cape Town
                        </p>
                        <div class="content">
                            <ul>
                                <li>
                                    Temporomandibular Joint (TMJ) Workshop, 16 – 17 August
                                </li>
                                <li>
                                    Transorbital and Endoscopic Surgery Workshops presented by Prof Darlene Lubbe, 18 August
                                </li>
                            </ul>
                        </div>
                        <p>
                            <strong>
                                19 – 21 August, SASFMOS Congress 2020, Century City, Cape Town, South Africa
                            </strong>
                        </p>
                        <figure class="polaroid">
                            <img src="{{ asset('images/prof_darlene_lubbe.jpg') }}" alt="Professor Darlene Lubbe">
                        </figure>
                        <p>
                            We are excited to announce Associate Professor Darlene Lubbe as a keynote speaker at the
                            congress in 2020. A/Prof Lubbe is the Associate Professor in the Division of Otolaryngology
                            at the Groote Schuur Hospital at the University of Cape Town, South Africa. Her main
                            interests are in endoscopic sinus, skull base, and now more recently, transorbital surgery.
                            She has presented her work on transorbital surgery at many international conferences across
                            the world and will be teaching the different techniques at international courses over the
                            next few years. We are excited to have her share her knowledge at a special Congress
                            Workshop session on 18 August as well as present at the Congress from 19 to 21 August.
                        </p>
                        <p>
                            Regular updates will be shared as they are available. We encourage delegates interested in
                            being part of the programme to submit their abstracts for consideration. Please contact us
                            directly for more information.
                        </p>
                        <p>
                            Registration will open early 2020, to receive updates directly to your inbox, please
                            subscribe to the SASMFOS Congress mailing list.
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
{{--                        <a href="https://congress.sasmfos.org/programme.htm" class="button is-rounded is-info is-uppercase" target="_blank"><strong>Latest announcement</strong></a>--}}
                        <a href="#" class="button is-rounded is-warning is-uppercase" target="_blank"><strong>Programme</strong></a>
                        <a href="#" class="button is-rounded is-success is-uppercase" target="_blank"><strong>Speakers</strong></a>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <div class="page-section-body">
                        <div class="columns">
                            <div class="column is-9">
                                <p>
                                    This year’s congress will officially be opened by SASMFOS, BAOMS, ANZAOMS and the IAOP. Our diverse group of presenters and speakers are represented by both SASMFOS and the IAOP. Topics will cover:
                                </p>
                                <div class="content">
                                    <ul>
                                        <li>head and neck malignancy</li>
                                        <li>reconstruction</li>
                                        <li>alternative reconstruction</li>
                                        <li>complex dental implant reconstruction</li>
                                        <li>orthognathics</li>
                                        <li>cranio-facial and clefts</li>
                                        <li>pathology and ethics</li>
                                        <li>TMJ</li>
                                        <li>a variety lectures on diverse topics</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="column is-flex programme-button-container">
                                <div class="button-line-right">
                                    <p class="has-text-info is-size-6 button-line-right-text">
                                        For more information <br>
                                        on the congress <br>
                                        programme <br>
                                    </p>
                                    <a href="#" class="button is-primary is-rounded" target="_blank">
                                        <strong>CLICK HERE</strong>
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
    <div>
        <div class="columns is-gapless mb-6">
            <div class="column">
                <div class="columns is-gapless">
                    <div class="column is-4 join-us-background-3 is-hidden-mobile">
                    </div>
                    <div class="column is-4 red-bg has-text-white">
                        <div class="p-2 has-text-centered-touch">
                            <h1 class="title is-3 is-uppercase has-text-white">Why attend?</h1>
                            <p class="is-size-6">Our annual congress provides members and affiliates with local and international networking opportunities and the opportunity to promote the industry on a local and international level. It provides guidance on best practice management for surgeons and medical aid funders, as well as insight into innovation trends in the industry.</p>
                        </div>
                    </div>
                    <div class="column dark-red-bg is-flex is-hidden-mobile">
                        <div class="p-1 align-bottom">
                            <a class="title is-3 has-text-white is-hidden-mobile has-vertical-text is-uppercase has-text-weight-light sans-serif-font" href="https://congress.sasmfos.org/index.htm" target="_blank">Join us!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="page-section">
            <div class="columns">
                <div class="column is-4 is-offset-1 mb-3 mt-1">
                    <header class="page-section-header">
                        <div class="icon">
                            <img src="{{ asset('svg/surgeon.svg') }}" alt="Find an MFO surgeon">
                        </div>
                        <h3 class="title">VENUE & LOGISTICS</h3>
                    </header>
                    <div class="page-section-body">
                        <p>
                            The 2020 congress will be held at the Century City Convention Centre in Cape Town, South Africa.
                        </p>
                        <p>
                            The precongress sessions will be held at the same venue.
                        </p>
                        <p>
                            For general logistical assistance, please contact:
                        </p>

                        <p><strong class="has-text-primary">Bridget de Beer</strong></p>
                        <p>
                            <fa class="has-text-primary mr" :icon="['fas', 'phone-alt']"></fa>
                            <a href="tel:+27-21-486-9111">+27 21 486 9111</a>
                            <br>
                            <fa class="has-text-primary mr" :icon="['fas', 'envelope']"></fa>
                            <a href="mailto:conference1@onscreenav.co.za">conference1@onscreenav.co.za</a>
                        </p>

                        <p><strong class="has-text-primary">Annie Klaas</strong></p>
                        <p>
                            <fa class="has-text-primary mr" :icon="['fas', 'phone-alt']"></fa>
                            <a href="tel:+27-21-486-9222">+27 21 486 9222</a>
                            <br>
                            <fa class="has-text-primary mr" :icon="['fas', 'envelope']"></fa>
                            <a href="mailto:conference2@onscreenav.co.za">conference2@onscreenav.co.za</a>
                        </p>

                        <p>For travel assistance, contact:</p>

                        <p>
                            <strong class="has-text-primary">Lisa Forsythe</strong> <br>
                            <strong class="has-text-info">Senior consultant/director</strong>
                        </p>
                        <p>
                            <fa class="has-text-primary mr" :icon="['fas', 'phone-alt']"></fa>
                            <a href="tel:+27-12-348-8560">+27 12 348 8560</a>
                            <br>
                            <fa class="has-text-primary mr" :icon="['fas', 'envelope']"></fa>
                            <a href="mailto:lisa@surevivatravels.co.za">lisa@surevivatravels.co.za</a>
                        </p>
                    </div>
                </div>
                <div class="column is-6 has-text-centered">
                    <conference-map></conference-map>
                </div>
            </div>
        </section>
    </div>
    <div>
        <section class="page-section">
            <div class="has-background-primary pt-2 pb-2">
                <div class="container">
                    <div class="columns">
                        <div class="column is-4 is-offset-1">
                            <h3 class="title has-text-white is-uppercase">Upcoming events</h3>
                        </div>
                        <div class="column is-2">
                            <a href="{{ route('home') }}#events" class="button is-info is-rounded is-uppercase"><strong>View</strong></a>
                        </div>
                        <div class="column is-hidden-mobile is-hidden-tablet-only">
                            <div class="conference-upcoming-image">
                                <img src="/images/content/conference-white.png" alt="" class="overflow-image">
                                <div class="no-overflow-container has-background-primary"></div>
                                <div class="no-overflow-container">
                                    &nbsp;
                                    <img src="/images/content/conference.png" alt="" class="no-overflow-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section registration-background">
            <div class="container">
                <div class="columns">
                    <div class="column is-4 is-offset-5">
                        <header class="page-section-header">
                            <div class="icon">
                                <img src="{{ asset('svg/surgeon.svg') }}" alt="Find an MFO surgeon">
                            </div>
                            <h3 class="title">Registration information</h3>
                        </header>
                        <div class="page-section-body pb-3">
                            <p>
                                Kindly note that registration fees are dependent on various categories of registration.
                            </p>

                            <p>
                                To register, please visit the official website for the congress and complete the details below to see the registration fee applicable to your selected criteria.
                            </p>

                            <div class="content">
                                <ul>
                                    <li>Country select</li>
                                    <li>Delegate details</li>
                                    <li>Workshop selections</li>
                                    <li>Social selections</li>
                                    <li>Registration fees</li>
                                </ul>
                            </div>

                            <a href="https://congress.sasmfos.org/registration.php" class="button is-danger is-rounded is-uppercase" target="_blank"><strong>Register today</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.cloud.key') }}"></script>
@endsection

@extends('layouts.master', ['footerSidebar' => false])
@section('content')
    <navigator active="education"></navigator>
    <page-banner src="{{ asset('images/banners/education.jpg') }}" :breadcrumb="['Home']" placement="top" background-color="#e8eef1">
        <template v-slot:title>
            <span>Education</span> & Research
        </template>
    </page-banner>

    <div class="page-mist">
        <div class="container">
            <div class="columns pb-4" id="value">
                <div class="column is-10 is-offset-1">
                    <div class="tile is-ancestor">
                        <div class="tile is-parent is-4 is-vertical">
                            <div class="tile is-child education-tile">
                                <header>
                                    <div class="icon">
                                        <img src="{{ asset('svg/stethascope-heart.svg') }}" alt="Value of SASMFOS membership">
                                    </div>
                                    <h4 class="title">Value of SASMFOS membership</h4>
                                </header>
                                <div class="tile-body content">
                                    <p>
                                        With around 12 million patients in South Africa, SASMFOS aims to represent our
                                        surgeons and to engage, on their behalf, with medical aid funds to facilitate
                                        coverage of medical procedures, hospitals, healthcare providers, patients and
                                        regulatory authorities.
                                    </p>
                                    <p>
                                        We provide support on best practice management for surgeons and for medical aid
                                        funders, as well as further education, research, professional development and
                                        insight into innovation trends in the industry.
                                    </p>
                                    <p>
                                        SASMFOS members benefit from our international exposure which is strengthened by
                                        our ongoing networking opportunities to promote and support the industry on a
                                        local and international level.
                                    </p>
                                    <p>
                                        The SASMFOS members’ room provides a platform for members to engage with each
                                        other. <a href="{{ route('ask') }}#enquiries"><strong>Click here</strong></a> to find out more.
                                    </p>
                                </div>
                            </div>
                            <div class="tile is-child education-tile">
                                <header>
                                    <div class="icon">
                                        <img src="{{ asset('svg/global-search.svg') }}" alt="Value of SASMFOS membership">
                                    </div>
                                    <h4 class="title">Access to global research</h4>
                                </header>
                                <div class="tile-body content">
                                    <p>
                                        Our aim is to lead research in our field and to ensure that our members have
                                        access to the latest developments and trends which impact on our profession. To
                                        find out more about developments in our global network,
                                        <a href="{{ route('media') }}"><strong>click here</strong></a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-4 is-parent is-vertical align-self-start">
                            <div class="tile is-child education-tile">
                                <header>
                                    <div class="icon">
                                        <img src="{{ asset('svg/clipboard.svg') }}" alt="Value of SASMFOS membership">
                                    </div>
                                    <h4 class="title">Apply for membership</h4>
                                </header>
                                <div class="tile-body content">
                                    <p>
                                        To apply for membership, please contact us. As part of your application, you
                                        will be asked to provide proof of academic qualifications, information about
                                        your professional experience, the medical services you offer, as well as the
                                        locations in which these services are offered. We offer assistance throughout
                                        this process.
                                    </p>
                                    <a href="{{ route('ask') }}#enquiries" class="button is-info is-rounded">CONTACT US</a>
                                </div>
                            </div>
                            <div class="tile is-child education-tile">
                                <header>
                                    <div class="icon">
                                        <img src="{{ asset('svg/certificate.svg') }}" alt="Value of SASMFOS membership">
                                    </div>
                                    <h4 class="title">Bursaries and funding for further study</h4>
                                </header>
                                <div class="tile-body content">
                                    <p>
                                        The professional development and further education of our members are of the
                                        utmost importance to us. To further this goal, we offer bursaries and funding
                                        for further studies. In cases where we may not be able to fund an opportunity,
                                        we assist our members by facilitating further funding opportunities.
                                    </p>
                                    <p>
                                        Our aim is to ensure that our members have access to as much support as
                                        possible. We hope to advance our profession and to ensure that our members
                                        remain current and in line with international professional standards.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tile is-4 is-parent">
                            <div class="tile is-child education-tile align-self-start">
                                <header>
                                    <div class="icon">
                                        <img src="{{ asset('svg/brain.svg') }}" alt="Value of SASMFOS membership">
                                    </div>
                                    <h4 class="title">Continuous learning and CPD points</h4>
                                </header>
                                <div class="tile-body content">
                                    <p>
                                        Continuous learning and peer education is important to us. Our programmes
                                        support further education initiatives of our members and we also encourage
                                        internal mentorship programmes for members who show potential.
                                    </p>
                                    <p>
                                        Our local and international networking events are often combined with various
                                        learning programmes, many of which offer CPD points as well as special focus
                                        sessions to keep members abreast of the most recent developments in the
                                        industry.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="page-section">
            <div class="columns" id="peers">
                <div class="column is-7 is-offset-1">
                    <header class="page-section-header">
                        <div class="icon circle">
                            <img src="{{ asset('svg/world-education.svg') }}" alt="Access to world-class peers">
                        </div>
                        <h3 class="title">Access to world-class peers</h3>
                    </header>
                    <div class="page-section-body">
                        <p>
                            Our ongoing initiatives and networking opportunities provide our members with local and
                            international exposure to world-class peers, education and research.
                        </p>
                        <p>
                            Alongside our annual Congress, we offer numerous opportunities to our members to keep in
                            contact and to engage with peers from affiliated associations across the globe.
                        </p>
                    </div>
                </div>
                <div class="column is-3 is-hidden-mobile">
                    <img src="{{ asset('images/specs-pen.png') }}" alt="" style="margin-bottom: -100%">
                </div>
            </div>
        </section>
        <section class="page-section" id="network">
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <header class="page-section-header">
                        <div class="icon circle">
                            <img src="{{ asset('svg/surgeon.svg') }}" alt="Access our global network">
                        </div>
                        <h3 class="title">Access our global network</h3>
                    </header>
                </div>
            </div>
        </section>
    </div>

    <member-search :specialities="{{ $specialities }}"
                   :cities="{{ $cities }}"
                   :hospitals="{{ $hospitals }}" here-token="{{ config('services.here.key') }}"
                   :total-members="{{ $totalMembers }}"></member-search>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.cloud.key') }}"></script>
@endsection

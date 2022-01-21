@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'SASMFOS Cares')
@section('content')
    <navigator active="cares"></navigator>
    <page-banner src="{{ asset('images/banners/cares.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>SASMFOS</span> Cares Initiative
        </template>
    </page-banner>
    <div class="container mb-4">
        <div class="columns">
            <div class="column is-offset-1">
                <div class="columns cares-intro">
                    <div class="column">
                        <div class="cares-intro-image"></div>
                    </div>
                    <div class="column">
                        <p class="has-text-grey">
                            SASMFOS puts patients first. We assist in private and public practice,
                            we also assist the public sector and those who are economically
                            challenged to access first-class specialist medical services.
                        </p>
                        <p class="has-text-grey">
                            Our pro bono services include providing advice and council on
                            treatments, procedures, access to funding and information.
                            We also support various not-for-profit causes.
                        </p>
                        <p class="has-text-grey">
                            Our goal is to facilitate meaningful private-public initiatives.
                            Our efforts include regular round tables to engage directly with
                            senior public officials and other important decisionmakers. We also
                            assist in mentoring stakeholders on important issues which impact upon
                            our profession and on the provision of medical services at large.
                        </p>
                    </div>
                </div>
                <div id="case-studies"></div>
                <div class="columns mt-4">
                    <div class="column">
                        <div class="mb-2">
                            <span class="icon is-large">
                                <img src="/images/icons/case-studies.svg" alt="">
                            </span>
                        </div>
                        <h1 class="title is-4 mb-4 has-text-primary">
                            CASE STUDIES
                        </h1>
                    </div>
                </div>

                <div class="columns is-gapless">
                    <div class="column">
                        <div class="hero is-warning p-2 rounded-top-left">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title is-5">
                                        Mediclinic Midstream gives the gift of hope to three young patients
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="has-background-light p-2">
                            <p class="mb-1 has-text-grey">
                                Mediclinic Midstream collaborated with the provincial
                                health department to give young patients pro bono cleft
                                repair surgeries. Dr Sharan Naidoo performed three of
                                the surgeries on a pro bono basis.
                            </p>
                        </div>
                        <div class="list card-links is-hoverable pl-2 pr-2 pb-2 has-background-light">
                            <a class="has-text-danger custom-list list-item" href="https://www.youtube.com/watch?v=XVlFGOOz4Zo" target="_blank">
                                <span class="icon is-medium">
                                    <img src="/images/icons/youtube.svg" alt="" class="fit-image">
                                </span>
                                <span>WATCH VIDEO</span>
                            </a>
                            <a class="has-text-danger custom-list list-item" href="https://www.thefutureofhealthcare.co.za/mediclinic-midstream-gives-gift-hope-christmas/" target="_blank">
                                <span class="icon is-medium">
                                    <img src="/images/icons/read-more.svg" alt="" class="fit-image">
                                </span>
                                <span>READ MORE</span>
                            </a>
                        </div>
                    </div>
                    <div class="column cares-card-image" style="background-image: url('images/content/case/1.jpg')"></div>
                </div>

                <div class="columns is-gapless pt-4">
                    <div class="column cares-card-image" style="background-image: url('images/content/case/2.jpg')"></div>
                    <div class="column">
                        <div class="hero is-info p-2 rounded-top-right">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title is-5">
                                        Banyana Banyana star receives a life-changing surgery
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="has-background-light p-2">
                            <p class="mb-1 has-text-grey">
                                SASMFOS President, Dr Frits Hoogendijk, partnered with Operation
                                Healing Hands to give Banyana Banyana star Ruth Luthuli a life-changing surgery.
                            </p>
                        </div>
                        <div class="list card-links is-hoverable pl-2 pr-2 pb-2 has-background-light">
                            <a class="has-text-danger custom-list list-item" href="https://www.youtube.com/watch?v=ue25NpsrQDU" target="_blank">
                                <span class="icon is-medium">
                                    <img src="/images/icons/youtube.svg" alt="" class="fit-image">
                                </span>
                                <span>WATCH VIDEO</span>
                            </a>
                            <div class="list-item custom-list has-text-grey">
                                <i>Life Healthcare publication Summer 2018/19</i>
                            </div>
                            <div class="list-item custom-list">
                                {{-- <a class="has-text-danger list-item custom-list">
                                    <span class="icon is-medium">
                                        <img src="/images/icons/read-more.svg" alt="" class="fit-image">
                                    </span>
                                    <span>READ MORE</span>
                                </a> --}}
                                <a class="has-text-danger list-item custom-list" href="/pdfs/case-studies/life_healthcare_summer.pdf" target="_blank">
                                    <span class="icon is-medium">
                                        <img src="/images/icons/pdf.svg" alt="" class="fit-image">
                                    </span>
                                    <span>DOWNLOAD PDF</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns is-gapless pt-4">
                    <div class="column">
                        <div class="hero is-success p-2 rounded-top-left">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title is-5">
                                        Ground-breaking surgery for Claude, the chimpanzee
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="has-background-light p-2">
                            <p class="mb-1 has-text-grey">
                                A team of South African veterinarians and a maxillofacial
                                surgeon succeeded in surgically lengthening
                                the misaligned jaw of an adult male chimpanzee.
                            </p>
                        </div>
                        <div class="list card-links is-hoverable pl-2 pr-2 pb-2 has-background-light">
                            <a class="has-text-danger custom-list list-item" href="{{ route('case') }}">
                                <span class="icon is-medium">
                                    <img src="/images/icons/read-more.svg" alt="" class="fit-image">
                                </span>
                                <span>READ MORE</span>
                            </a>
                            <a class="has-text-danger list-item custom-list" href="/pdfs/case-studies/claude-the-chimpanzee.pdf" target="_blank">
                                <span class="icon is-medium">
                                    <img src="/images/icons/pdf.svg" alt="" class="fit-image">
                                </span>
                                <span>DOWNLOAD PDF</span>
                            </a>
                        </div>
                    </div>
                    <div class="column cares-card-image" style="background-image: url('images/content/case/3.jpg')"></div>
                </div>

                <div class="columns is-gapless pt-4">
                    <div class="column cares-card-image" style="background-image: url('images/content/case/4.jpg')"></div>
                    <div class="column">
                        <div class="hero is-primary p-2 rounded-top-right">
                            <div class="hero-body">
                                <div class="container">
                                    <h1 class="title is-5">
                                        Innovative 3D facial implants for patients
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="has-background-light p-2">
                            <p class="mb-1 has-text-grey">
                                Carte Blanche investigates the process of innovative 3D
                                facial implant / mandibular surgery, carried out by
                                maxillofacial and oral surgeon, Dr Vivesh Rughubar.
                            </p>
                        </div>
                        <div class="list card-links is-hoverable pl-2 pr-2 pb-2 has-background-light">
                            <a class="has-text-danger custom-list list-item" href="https://youtu.be/aPc9GcKTty8" target="_blank">
                                <span class="icon is-medium">
                                    <img src="/images/icons/youtube.svg" alt="" class="fit-image">
                                </span>
                                <span>WATCH VIDEO</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="columns pt-4">
                    <div class="button-line-left">
                        <p class="has-text-info is-size-6 button-line-left-text">
                            For more news,<br>
                            visit our media page
                        </p>
                        <a class="button is-rounded is-primary" href="{{ route('media') }}">CLICK HERE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="drive-funding-banner">
        <div class="ask-samsfos columns is-gapless pr-4-desktop-up padding-2-mobile">
            <div class="column is-one-third drive-funding-background is-hidden-mobile"></div>
            <div class="column is-4 has-text-white has-background-danger">
                <div class="p-3-touch pl-4-touch has-text-centered-touch">
                    <h3 class="title is-3 is-uppercase has-text-white">GET INVOLVED /<br>DRIVE FUNDING</h3>
                    <p class="is-size-6 has-text-white">
                        SASMFOS undertakes pro-bono projects on an ongoing
                        basis and we value any contribution services, expertise or funding.<br>
                        Contact us today to get involved!
                    </p>
                </div>
            </div>
            <div class="column drive-funding-banner-btn-holder">
                <div class="drive-funding-banner-btn">
                    <div class=" has-text-centered-touch">
                        <a class="button is-danger is-rounded" href="{{ route('ask') }}#enquiries">
                            CONTACT US
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="columns">
            <div class="column cares-heart-container is-hidden-mobile is-hidden-tablet-only">
                <img src="/images/content/cares-heart.jpg" alt="" class="cares-heart">
            </div>
        </div>
    </div>

    <ask-sasmfos></ask-sasmfos>
@endsection

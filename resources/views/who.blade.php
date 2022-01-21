@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Who We Are')
@section('content')
    <navigator active="who"></navigator>
    <page-banner src="{{ asset('images/banners/who-we-are.jpg') }}" :breadcrumb="['Home']" placement="top">
        <template v-slot:title>
            <span>Who</span> We Are
        </template>
    </page-banner>
    <div class="who-we-are-float is-hidden-tablet-only is-hidden-mobile">
        <div>
            <img src="/images/content/medical-funders.png" alt="" class="stethoscope">
        </div>
        <div>
            <img src="/images/content/hospitals.png" alt="" class="glasses">
        </div>
    </div>
    <div class="container mb-4">
        <div class="columns" id="vision">
            <div class="column is-hidden-tablet-only is-5 is-offset-1">
                <div class="who-we-are-header who-we-are-intro">
                </div>
            </div>
            <div class="column is-3-desktop has-text-white">
                <div class="has-background-info p-2 who-we-are-intro">
                    <div class="mb-1">
                        <span class="icon is-large">
                            <img src="/images/icons/vision.svg" alt="">
                        </span>
                    </div>
                    <h1 class="title is-4 has-text-white mb-2">
                        VISION
                    </h1>
                    <p>
                        Our vision is to add significant value to the South African healthcare and dental
                        value chain through the uniquely specialised offerings of our members.
                    </p>
                </div>
            </div>
            <div class="column has-text-white">
                <div class="has-background-primary p-2 who-we-are-intro">
                    <div class="mb-1">
                        <span class="icon is-large">
                            <img src="/images/icons/mission.svg" alt="">
                        </span>
                    </div>
                    <h1 class="title is-4 has-text-white mb-2">
                        MISSION
                    </h1>
                    <p>
                        Our mission is to represent maxillofacial and oral surgery well, to engage with all
                        stakeholders, to develop a fertile environment in which our speciality services can
                        flourish, while developing a legacy of excellence for the future. We believe that
                        this can be done through positive influence, the sharing of knowledge and thought
                        leadership.
                    </p>
                </div>
            </div>
        </div>
        <div class="columns mt-4" id="values">
            <div class="column has-text-centered is-offset-1">
                <div class="mb-2">
                    <span class="icon is-large">
                        <img src="/images/icons/values.svg" alt="">
                    </span>
                </div>
                <h1 class="title is-4 mb-4 has-text-primary">
                    OUR VALUES
                </h1>
            </div>
        </div>
        <sasmfos-values></sasmfos-values>
        <div class="columns mt-4" id="purpose">
            <div class="column is-offset-1">
                <div class="mb-2">
                    <span class="icon is-large">
                        <img src="/images/icons/purpose.svg" alt="">
                    </span>
                </div>
                <h1 class="title mb-4 has-text-primary">
                    PURPOSE & RESPONSIBILITIES
                </h1>
                <p class="has-text-grey mb-1">
                    The South African Society of Maxillofacial and Oral Surgeons (SASMFOS) is a
                    non-profit member-based association offering unique medical and dental
                    specialist skills in South Africa and abroad.
                </p>
                <p class="has-text-grey mb-1">
                    Our members represent the surgical branch of both
                    medicine and dentistry, and are concerned with the diagnosis
                    and treatment of diseases which affect the mouth, jaws, face and neck.
                </p>
                <p class="has-text-grey mb-1">
                    We aim to represent our surgeons and to engage, on their behalf,
                    with medical aid funds to facilitate coverage of medical procedures,
                    hospitals, healthcare providers, patients and regulatory authorities.
                    We provide support on best practice management, as well as further
                    education, research, professional development and insight into
                    innovation trends in the industry.
                </p>
                <p class="has-text-grey mb-1">
                    Our advisory services include negotiations on applicable tariffs and
                    fees, and we provide guidance on regulatory and legislative developments
                    which may have an impact on the public and the healthcare profession at large.
                </p>
                <div class="button-line-left">
                    <p class="has-text-info is-size-6 button-line-left-text">
                        For more information
                    </p>
                    <b-button rounded tag="a" type="is-primary" href="{{ route('ask') }}#enquiries">CONTACT
                        US
                    </b-button>
                </div>
            </div>
            <div class="column is-three-fifths has-text-right is-hidden-tablet-only is-hidden-mobile">
                <img src="/images/content/sasmfos-logo-inner-shadow.png" alt="" class="purpose-image">
            </div>
        </div>
        <div class="columns mt-4">
            <div class="column is-offset-1 has-text-centered">
                <div class="mb-2">
                    <span class="icon is-large">
                        <img src="/images/icons/exco.svg" alt="">
                    </span>
                </div>
                <h1 class="title is-4 mb-4 has-text-primary">
                    SASMFOS EXCO
                </h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-offset-1">
                <div class="columns is-multiline staff-member-container">
                    <div class="column is-4 is-hidden-tablet-only is-hidden-mobile">
                        <img src="/images/content/xray.jpg" alt="" class="xray">
                    </div>
                    @foreach ($staff as $index => $staff)
                        @if ($loop->index === 2 )
                            <div class="column is-4 is-hidden-tablet-only is-hidden-mobile">

                            </div>
                        @endif
                        <div class="column is-4-desktop is-6-tablet">
                            <div class="staff-member">
                                <div>
                                    <h1 class="title is-5 has-text-primary">
                                        {{ $staff->name }}
                                    </h1>
                                    <p class="has-text-info mb-1">
                                        {{ $staff->position }}
                                    </p>
                                    <p class="has-text-info mb-1">
                                        @foreach ($staff->qualifications as $index => $qualification)
                                            @if ($loop->first)
                                                [{{ $qualification }},
                                            @else
                                                {{ $qualification }},
                                            @endif
                                            @if ($loop->last)
                                                {{ $qualification }}]
                                            @endif
                                        @endforeach

                                    </p>
                                    <div class="has-text-grey">
                                        {!! $staff->description !!}
                                    </div>
                                </div>
                                <div class="mt-4">
                                    @if ($staff->phone)
                                        <a href="tel:{{ $staff->phone }}">
                                            <span class="icon is-medium">
                                                <fa icon="phone"></fa>
                                            </span>
                                        </a>
                                    @endif
                                    @if ($staff->email)
                                        <a href="mailto:{{ $staff->email }}">
                                            <span class="icon is-medium">
                                                <fa icon="envelope"></fa>
                                            </span>
                                        </a>
                                    @endif
                                    @if ($staff->social)
                                        <a href="{{ $staff->social }}" target="_blank">
                                            <span class="icon is-medium">
                                                <fa :icon="['fab', 'linkedin-in']"></fa>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="columns mt-4">
            <div class="column is-offset-1">
                <div class="who-we-are-btns">
                    <div class="button-holder">
                        <a class="button is-primary is-rounded"
                            href="/pdfs/draft_bill_of_rights.pdf" target="_blank">
                            DOWNLOAD OUR DRAFT BILL OF RIGHTS
                        </a>
                    </div>
                    <div class="button-holder">
                        <a class="button is-success is-rounded"
                            href="/pdfs/sasmfos-third-molar-policy.pdf" target="_blank">
                            DOWNLOAD OUR THIRD MOLAR POLICY
                        </a>
                    </div>
                    <div class="button-holder">
                        <a class="button is-warning is-rounded"
                            href="/pdfs/sada-position-statement.pdf" target="_blank">
                            DOWNLOAD SADA POSITION STATEMENT
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ask-sasmfos></ask-sasmfos>
@endsection

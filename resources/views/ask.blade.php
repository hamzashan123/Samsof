@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Who We Are')
@section('content')
    <navigator active="ask"></navigator>
    <page-banner src="{{ asset('images/banners/ask-sasmfos.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>Ask SASMFOS</span>
        </template>
    </page-banner>
    <div class="container">
        <div class="columns" id="procedures">
            <div class="column is-offset-1">
                <div class="mb-2">
                    <span class="icon is-large">
                        <img src="/images/icons/procedures.svg" alt="">
                    </span>
                </div>
                <h1 class="title is-4 mb-4 has-text-primary">
                    DIRECTORY OF PROCEDURES
                </h1>
                <p class="has-text-grey">
                    More information on numerous maxillofacial and oral conditions, procedures and treatments.
                </p>
            </div>
        </div>
        <section class="page-section">
            <div class="columns">
                <div class="column is-offset-1">
                    <sasmfos-procedures :procedure-items="{{ $procedures }}"></sasmfos-procedures>
{{--                    <div class="columns">--}}
{{--                        <div class="column">--}}
{{--                            <a class="button is-danger is-outlined ask-procedure-btn">--}}
{{--                                <span class="icon is-large">--}}
{{--                                    <img src="/images/icons/pdf.svg" class="fit-image">--}}
{{--                                </span>--}}
{{--                                <span>--}}
{{--                                    DOWNLOAD A COMPREHENSIVE LIST OF PROCEDURES--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="columns" id="enquiries">
                <div class="column is-offset-1">
                    <div class="columns mt-4">
                            <div class="column">
                                <div class="mb-2">
                                    <span class="icon is-large">
                                        <img src="/images/icons/general-enquiries.svg" alt="">
                                    </span>
                                </div>
                                <h1 class="title is-4 has-text-primary mb-2">
                                    GENERAL ENQUIRIES
                                </h1>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
    <div class="ask-table" id="enquiries">
        <div class="ask-table-body">
            <div class="ask-table-row">
                <div class="container">
                    <div class="column is-offset-1">
                        <div class="ask-table-row-body has-text-warning">
                            <div class="ask-table-cell">
                                <strong class="has-text-warning">
                                    General enquiries and contact details
                                </strong>
                            </div>
                            <div class="ask-table-cell">
                                SASMFOS Office
                            </div>
                            <div class="ask-table-cell">
                                <a class="has-text-warning button ask-buttons" href="tel:0027128073052">
                                    <span class="icon is-small">
                                        <fa icon="phone"></fa>
                                    </span>
                                </a>
                                <a class="has-text-warning button ask-buttons" href="mailto:info@sasmfos.org">
                                    <span class="icon is-small">
                                        <fa icon="envelope"></fa>
                                    </span>
                                </a>
                                <a class="has-text-warning button ask-buttons" href="{{ config('sasmfos.social.facebook') }}" target="_blank">
                                    <span class="icon is-small">
                                        <fa :icon="['fab', 'facebook-f']"></fa>
                                    </span>
                                </a>
                                <a class="has-text-warning button ask-buttons" href="{{ config('sasmfos.social.twitter') }}" target="_blank">
                                    <span class="icon is-small">
                                        <fa :icon="['fab', 'twitter']"></fa>
                                    </span>
                                </a>
                                <a class="has-text-warning button ask-buttons" href="{{ config('sasmfos.social.linkedin') }}" target="_blank">
                                    <span class="icon is-small">
                                        <fa :icon="['fab', 'linkedin-in']"></fa>
                                    </span>
                                </a>
                                <a class="has-text-warning button ask-buttons" href="{{ config('sasmfos.social.youtube') }}" {{-- target="_blank" --}}>
                                    <span class="icon is-small">
                                        <img src="/images/icons/youtube-text.svg" alt="">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="office">
        <section class="page-section">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="columns mt-4">
                        <div class="column">
                            <div class="mb-2">
                                <span class="icon is-medium">
                                    <img src="/images/icons/bearers.svg" alt="">
                                </span>
                            </div>
                            <h1 class="title is-4 has-text-primary mb-2">
                                SASMFOS OFFICE BEARERS
                            </h1>
                            <p class="has-text-grey mb-2">
                                The SASMFOS team is here to help. For more detailed information, please refer to the following directory of board members and office bearers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="ask-table bearers-table mb-2">
        <div class="ask-table-body">
            @foreach ($staff as $staff)
                <div class="ask-table-row">
                    <div class="container">
                        <div class="column is-offset-1">
                            <div class="ask-table-row-body has-text-warning">
                                <div class="ask-table-cell">
                                    <strong class="has-text-primary">
                                        {{ $staff->name }}
                                    </strong>
                                </div>
                                <div class="ask-table-cell has-text-info">
                                    {{ $staff->position }}
                                </div>
                                <div class="ask-table-cell">
                                    @if ($staff->phone)
                                        <a class="has-text-primary button ask-buttons" href="tel:{{ $staff->phone }}">
                                            <span class="icon is-small">
                                                <fa icon="phone"></fa>
                                            </span>
                                        </a>
                                    @endif
                                    @if ($staff->email)
                                        <a class="has-text-primary button ask-buttons" href="mailto:{{ $staff->email }}">
                                            <span class="icon is-small">
                                                <fa icon="envelope"></fa>
                                            </span>
                                        </a>
                                    @endif
                                    @if ($staff->social != NULL)
                                        <a class="has-text-primary button ask-buttons" href="{{ $staff->social }}" target="_blank">
                                            <span class="icon is-small">
                                                <fa :icon="['fab', 'linkedin-in']"></fa>
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container" id="specialists">
        <section class="page-section">
            <div class="columns">
                <div class="column is-7 is-offset-1">
                    <header class="page-section-header">
                        <div class="icon">
                            <img src="{{ asset('svg/surgeon.svg') }}" alt="Find an MFO surgeon">
                        </div>
                        <h3 class="title">Find an MFO surgeon</h3>
                    </header>
                </div>
            </div>
        </section>
    </div>
    <member-search :specialities="{{ $specialities }}"
                   :cities="{{ $cities }}"
                   :hospitals="{{ $hospitals }}" here-token="{{ config('services.here.key') }}"
                   :total-members="{{ $totalMembers }}"></member-search>
    <div class="mb-4"></div>
    <ask-sasmfos></ask-sasmfos>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.cloud.key') }}"></script>
@endsection

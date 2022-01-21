@extends('layouts.master', ['footerSidebar' => false])

@section('content')
    <navigator active="media"></navigator>
    @if(session()->has('success'))

    @endif
    <page-banner src="{{ asset('images/banners/media.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>Media</span>
        </template>
    </page-banner>
    <div id="releases"></div>
    <header-bar header-bg="#056db6" header-title="MEDIA RELEASES" icon-name="/images/icons/newspaper.svg"></header-bar>
    <posts-cards-index
        endpoint="{{ route('api.releases.index') }}"
        bg-color="#056db6"
        media-type='release'
        share-action="{{ route('share') }}"
        site-key="{{ config('services.google.recaptcha.key') }}"
        next-section-id="coverage"></posts-cards-index>
    <div class="shadow-top">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="columns">
                        <div class="column pt-2 pb-2">
                            <p>
                                For media enquiries, please contact the team at Stone on +27 (1)11 447 0168 or email them <a
                                    href="mailto:sasmfos@stone.consulting" class="is-link is-primary">here.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="coverage"></span>
    <header-bar header-bg="#d35459" header-title="MEDIA COVERAGE" icon-name="/images/icons/coverage.svg"></header-bar>
    <posts-cards-index
        endpoint="{{ route('api.coverages.index') }}"
        bg-color="#d35459" media-type='coverage'
        share-action="{{ route('share') }}"
        site-key="{{ config('services.google.recaptcha.key') }}"
        next-section-id="opinions"></posts-cards-index>
    <div class="media-subscribe-banner">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-1">
                    <div class="columns">
                        <div class="column pt-2 pb-2">
                            <a class="has-text-black title is-4" href="{{ config('sasmfos.social.youtube') }}" target="_blank">
                                <span class="icon is-large has-text-danger">
                                    <fa icon="arrow-circle-right"></fa>
                                </span>
                                <span>
                                    SUBSCRIBE TO THE <span class="has-text-danger">SASMFOS CHANNEL</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="opinions"></div>
    <header-bar header-bg="#f6ab20" header-title="SASMFOS OPINIONS" icon-name="/images/icons/opinions.svg"></header-bar>
    <posts-lists-index endpoint="{{ route('api.opinions.index') }}"
                       :show-card-image="false"
                       bg-color="#f6ab20"
                       :opinions-links="true"
                       :background-class="true"
                       share-action="{{ route('share') }}"  site-key="{{ config('services.google.recaptcha.key') }}"></posts-lists-index>

    <div id="resources"></div>
    <header-bar header-bg="#27b473" header-title="MEDIA RESOURCES" icon-name="/images/icons/resources.svg"></header-bar>
{{--    <posts-lists-index endpoint="{{ route('api.photos.index') }}"--}}
{{--                       :show-card-image="true" bg-color="#27b473"--}}
{{--                       media-placeholder="/images/media/photos.png"--}}
{{--                       :section-title-inside="true"--}}
{{--                       section-title="PHOTOS"--}}
{{--                       share-action="{{ route('share') }}"  site-key="{{ config('services.google.recaptcha.key') }}"></posts-lists-index>--}}

    <posts-lists-index
        endpoint="{{ route('api.videos.index') }}"
        :show-card-image="true" bg-color="#27b473"

        :section-title-inside="true"
        section-title="VIDEOS"
        share-action="{{ route('share') }}"  site-key="{{ config('services.google.recaptcha.key') }}"></posts-lists-index>
    <posts-lists-index
                        endpoint="{{ route('api.documents.index') }}"
                        :show-card-image="false" bg-color="#27b473"
                        section-title="DOCUMENTS"
                        share-action="{{ route('share') }}"  site-key="{{ config('services.google.recaptcha.key') }}"></posts-lists-index>
    <ask-sasmfos></ask-sasmfos>
@stop

@section('scripts')
<!-- Google ReCaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google.recaptcha.key') }}"></script>
@endsection

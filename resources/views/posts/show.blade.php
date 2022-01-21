@extends('layouts.master', ['active' => 'posts'])

@section('content')
<navigator active="media"></navigator>
<div class="container">
    <div class="columns mt-4 mb-5">
        <div class="column is-offset-1">
            <div>
                <img src="/images/logo.png" alt="SASMFOS Logo" class="sasmfos-logo">
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column is-offset-1">
            <div class="columns">
                <div class="column">
                    @if ($data->presentable_published_date)
                        <p class="subtitle is-5">
                            {{ $data->presentable_published_date }}
                        </p>
                    @endif
                    <hr class="post-header">
                    <h1 class="title is-3 mt-2 has-text-primary post-header">
                        {{ $data->title }}
                    </h1>
                    <div class="content post-content">
                        {!! $data->presentable_content !!}
                    </div>
                </div>
            </div>
            <div class="columns mt-3 mb-3">
                <div class="column">
                    <a class="button is-primary is-rounded {{ $data->link ? null : 'is-hidden' }}" href="{{ $data->link }}">
                        <span>
                            Read Original Article
                        </span>
                    </a>
                    <a class="button is-primary is-rounded {{ $data->link_type === 'youtube' ? null : 'is-hidden' }}" href="{{ $data->link }}">
                        <span class="icon">
                            <fa icon="video"></fa>
                        </span>
                        <span>
                            Watch Video
                        </span>
                    </a>
                    <a class="button is-primary is-rounded {{ $data->link_type === 'podcast' ? null : 'is-hidden' }}" href="{{ $data->link }}">
                        <span class="icon">
                            <fa icon="microphone"></fa>
                        </span>
                        <span>
                            Listen to Podcast
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master', ['active' => 'posts'])
@section('title', 'Ground-breaking surgery for Claude, the chimpanzee')
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
                    <div class="content post-content">
                        <h1 class="title is-3 has-text-primary">
                            Ground-breaking surgical procedure by South African team regarded as the first of its kind
                        </h1>
                        {!! $data !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="columns mt-3 mb-3">
        <div class="column is-offset-1">
            <a class="button is-primary is-rounded" href="https://www.up.ac.za/news/post_2579142-ground-breaking-surgical-procedure-by-south-african-veterinarians-regarded-as-the-first-of-its-kind">
                <span>
                    Read Original Article
                </span>
            </a>
            <a class="button is-primary is-rounded" href="/pdfs/case-studies/claude-the-chimpanzee.pdf" target="_blank">
                <span>
                    Download PDF
                </span>
            </a>
        </div>
    </div>
</div>
@endsection

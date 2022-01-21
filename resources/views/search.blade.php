@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Search')
@section('content')
    <navigator active="resources"></navigator>
    <page-banner src="{{ asset('images/banners/resources.jpg') }}" :breadcrumb="['{{ '"' . $q . '"' }}']">
        <template v-slot:title>
            <span>Search Results</span>
        </template>
    </page-banner>

    <div class="container">
        @if ($results->count())
            <div class="columns">
                <div class="column">
                    Found {{ $results->count() }} results for search query <strong>"{{ $q }}"</strong>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    @foreach ($results as $result)
                        <div class="search-result">
                            <div class="result-type">{{ $result->type }}</div>
                            <div class="result-title">
                                <a href="{{ $result->view_url }}">{{ $result->title }}</a>
                            </div>
                            <div class="result-excerpt">
                                {{ $result->excerpt }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                No results found for search query <strong>"{{ $q }}"</strong>. Refine your search and try again:
                            </div>

                            <form method="get" action="{{ route('search') }}">
                                <div class="field has-addons">
                                    <div class="control is-expanded">
                                        <input name="q" type="text" class="input" placeholder="Search..." value="{{ $q }}">
                                    </div>
                                    <div class="control">
                                        <button class="button">
                                            <fa icon="search"></fa>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop

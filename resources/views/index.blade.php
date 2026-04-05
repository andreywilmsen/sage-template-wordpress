@extends('layouts.app')

@section('content')
    <div class="container-fluid section-page">
        @include('partials.page-header')
        <div class="row container container-page">
            <div class="col-sm-12 col-md-9 section-content">

                @if (!have_posts())
                    <x-alert type="warning">
                        {!! __('Sorry, no results were found.', 'sage') !!}
                    </x-alert>
                    {!! get_search_form(false) !!}
                @endif

                <div class="posts-grid">
                    @while (have_posts())
                        @php(the_post())
                        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
                    @endwhile
                </div>

                <div class="pagination-wrapper mt-5">
                    {!! get_the_posts_navigation() !!}
                </div>
            </div>

            <aside class="col-sm-12 col-lg-3">
                @include('sections.sidebar')
            </aside>
        </div>
    </div>
@endsection

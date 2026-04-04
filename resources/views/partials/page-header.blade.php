@php
    $color_accent = get_theme_mod('cor_destaque_pagina');
    $color_text_page_header = get_theme_mod('cor_texto_page_header');
@endphp

<style>
    :root {
        --color-accent: {{ $color_accent }};
        --color-text-page-header: {{ $color_text_page_header }};
    }
</style>

<section class="page-header container">
    <div class="">
        <div class="row">
            <div class="col-md-9 page-title">
                <h1 class="">{!! $title !!}</h1>
            </div>
            <div class="col-md-3">
                @include('partials.breadcrumbs')
            </div>
        </div>
    </div>
</section>

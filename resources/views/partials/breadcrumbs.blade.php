<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ home_url('/') }}">
                <i class="fa-solid fa-house me-1"></i> {{ __('Início', 'sage') }}
            </a>
        </li>

        @if (is_category() || is_single())
            <li class="breadcrumb-item">
                {!! get_the_category_list(', ') !!}
            </li>
            @if (is_single())
                <li class="breadcrumb-item active" aria-current="page">
                    {{ get_the_title() }}
                </li>
            @endif
        @elseif (is_page())
            <li class="breadcrumb-item active" aria-current="page">
                {{ get_the_title() }}
            </li>
        @elseif (is_search())
            <li class="breadcrumb-item active" aria-current="page">
                {{ __('Resultados para:', 'sage') }} "{{ get_search_query() }}"
            </li>
        @elseif (is_404())
            <li class="breadcrumb-item active" aria-current="page">
                {{ __('Erro 404', 'sage') }}
            </li>
        @endif
    </ol>
</nav>

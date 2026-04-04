@php
    // Barra de contatos

    $cor_barra_contato = get_theme_mod('cor_barra_contato');
    $cor_hover_links = get_theme_mod('cor_hover_links_contato');
    $cor_texto = get_theme_mod('cor_texto_contato');
    // Barra de menu
    $cor_barra_menu = get_theme_mod('cor_barra_menu');
    $cor_hover_links_menu = get_theme_mod('cor_hover_links_menu');
    $cor_texto_menu = get_theme_mod('cor_texto_menu');
    $cor_texto_botao_contato_menu = get_theme_mod('cor_texto_botao_contato_menu');
    $cor_fundo_botao_contato_menu = get_theme_mod('cor_fundo_botao_contato_menu');

@endphp

<style>
    :root {
        /* Barra de contato */
        --cor-barra-contato: {{ $cor_barra_contato }};
        --cor-hover-links: {{ $cor_hover_links }};
        --cor-texto: {{ $cor_texto }};
        /* Barra de menu */
        --cor-barra-menu: {{ $cor_barra_menu }};
        --cor-hover-links-menu: {{ $cor_hover_links_menu }};
        --cor-texto-menu: {{ $cor_texto_menu }};
        --cor-texto-botao-contato-menu: {{ $cor_texto_botao_contato_menu }};
        --cor-fundo-botao-contato-menu: {{ $cor_fundo_botao_contato_menu }}
    }
</style>

<header id="masthead">
    <div class="container-fluid contact-bar d-none d-md-block">
        <div class="row h-100 align-items-center">
            <div class="col-6 d-flex justify-content-start contact-links-top">
                @if ($telefone)
                    <a href="tel:{{ $telefone_link }}" class="mobile-contact-item">
                        <i class="fa-solid fa-phone"></i> {{ $telefone }}
                    </a>
                @endif
                @if ($email)
                    <a href="mailto:{{ $email }}"><i class="fa-solid fa-envelope"></i>{{ $email }}</a>
                @endif
            </div>
            <div class="col-6 d-flex justify-content-end social-links-top">
                @if ($whatsapp_link || $instagram_link || $facebook_link)
                    <span class="social-label">Siga-nos:</span>
                    <div class="icons-wrapper">
                        @if ($whatsapp_link)
                            <a href="{{ $whatsapp_link }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        @endif
                        @if ($instagram_link)
                            <a href="{{ $instagram_link }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if ($facebook_link)
                            <a href="{{ $facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="content-masthead">
        <div class="container-fluid">
            <div class="row h-100 align-items-center">
                <div class="col-6 col-md-4 d-flex align-items-center">
                    <div class="brand-masthead">
                        @if (has_custom_logo())
                            {!! get_custom_logo() !!}
                        @else
                            <a class="brand-text" href="{{ home_url('/') }}">{{ get_bloginfo('name') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-flex justify-content-center">
                    <div class="nav-primary">
                        @if (has_nav_menu('top_menu'))
                            <nav aria-label="{{ wp_get_nav_menu_name('top_menu') }}">
                                {!! wp_nav_menu([
                                    'theme_location' => 'top_menu',
                                    'menu_class' => 'nav-links',
                                    'echo' => false,
                                ]) !!}
                            </nav>
                        @endif
                    </div>
                </div>
                <div class="col-6 col-md-4 d-flex justify-content-end align-items-center gap-3">
                    <div class="contact-button-masthead d-none d-lg-block">
                        <a href="{{ home_url('/contato') }}" class="btn-custom">
                            {{ $botao_contato }}
                        </a>
                    </div>
                    <button class="mobile-toggle d-md-none" id="mobile-menu-trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <button class="close-menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="mobile-menu-content">
            @if (has_nav_menu('top_menu'))
                {!! wp_nav_menu([
                    'theme_location' => 'top_menu',
                    'menu_class' => 'mobile-nav-links',
                    'echo' => false,
                ]) !!}
            @endif

            <div class="mobile-extra-info">
                <hr>
                @if ($telefone)
                    <a href="tel:{!! $telefone !!}" class="mobile-contact-item"><i
                            class="fa-solid fa-phone"></i>{!! $telefone !!}</a>
                @endif
                @if ($whatsapp_link || $instagram_link || $facebook_link)
                    <div class="mobile-social-icons">
                        @if ($whatsapp_link)
                            <a href="{{ $whatsapp_link }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        @endif
                        @if ($instagram_link)
                            <a href="{{ $instagram_link }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if ($facebook_link)
                            <a href="{{ $facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

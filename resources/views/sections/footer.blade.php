@php
    $cor_fundo_rodape = get_theme_mod('cor_fundo_rodape', '#1D2327');
    $cor_titulos_rodape = get_theme_mod('cor_titulos_rodape', '#ffffff');
    $cor_hover_geral = get_theme_mod('cor_hover_geral', '#DAA520');
    $cor_texto_menu_filho = get_theme_mod('cor_texto_menu_filho', '#adb5bd');
    $cor_hover_menu_filho = get_theme_mod('cor_hover_menu_filho', '#ffffff');
    $cor_texto_menu_neto = get_theme_mod('cor_texto_menu_neto', '#adb5bd');
    $cor_texto_contato = get_theme_mod('cor_texto_contato', '#adb5bd');
    $cor_icone_contato = get_theme_mod('cor_icone_contato', '#DAA520');
    $cor_borda_circulo_contato = get_theme_mod('cor_borda_circulo_contato', 'rgba(255,255,255,0.1)');
    $cor_fundo_circulo_contato = get_theme_mod('cor_fundo_circulo_contato', 'transparent');
    $cor_hover_texto_contato = get_theme_mod('cor_hover_texto_contato', '#ffffff');
    $cor_hover_icone_contato = get_theme_mod('cor_hover_icone_contato', '#1D2327');
    $cor_hover_fundo_circulo_contato = get_theme_mod('cor_hover_fundo_circulo_contato', '#DAA520');
    $titulo_contatos = get_theme_mod('texto_titulo_contatos', 'Contatos');
@endphp

<style>
    :root {
        --footer-bg: {!! $cor_fundo_rodape !!};
        --footer-titles: {!! $cor_titulos_rodape !!};
        --footer-accent: {!! $cor_hover_geral !!};
        --menu-child-text: {!! $cor_texto_menu_filho !!};
        --menu-child-hover: {!! $cor_hover_menu_filho !!};
        --menu-grandchild-text: {!! $cor_texto_menu_neto !!};
        --contact-text: {!! $cor_texto_contato !!};
        --contact-icon: {!! $cor_icone_contato !!};
        --contact-circle-border: {!! $cor_borda_circulo_contato !!};
        --contact-circle-bg: {!! $cor_fundo_circulo_contato !!};
        --contact-hover-text: {!! $cor_hover_texto_contato !!};
        --contact-hover-icon: {!! $cor_hover_icone_contato !!};
        --contact-hover-circle-bg: {!! $cor_hover_fundo_circulo_contato !!};
    }
</style>

<footer id="mastfooter" class="content-info container-fluid">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-4 footer-brand">
            @if (has_custom_logo())
                {!! get_custom_logo() !!}
            @else
                <a class="brand-text" href="{{ home_url('/') }}">{{ get_bloginfo('name') }}</a>
            @endif
        </div>

        <div class="col-md-12 col-lg-4 footer-menu">
            @if (has_nav_menu('footer_menu'))
                <nav aria-label="{{ wp_get_nav_menu_name('footer_menu') }}">
                    {!! wp_nav_menu([
                        'theme_location' => 'footer_menu',
                        'menu_class' => 'nav-links',
                        'container' => false,
                        'echo' => false,
                    ]) !!}
                </nav>
            @endif
        </div>

        <div class="col-md-12 col-lg-4 footer-contact">
            @if ($telefone || $email)
                <h3 class="footer-title">{{ $titulo_contatos }}</h3>
                <div class="contact-wrapper">
                    @if ($telefone)
                        <a href="tel:{{ $telefone_link }}" class="contact-item">
                            <span class="icon-circle"><i class="fa-solid fa-phone"></i></span>
                            <span class="contact-text">{{ $telefone }}</span>
                        </a>
                    @endif
                    @if ($email)
                        <a href="mailto:{{ $email }}" class="contact-item">
                            <span class="icon-circle"><i class="fa-solid fa-envelope"></i></span>
                            <span class="contact-text">{{ $email }}</span>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</footer>

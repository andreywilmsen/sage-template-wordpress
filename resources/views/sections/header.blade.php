<header id="masthead">
    <div class="container-fluid contact-bar d-none d-md-block">
        <div class="row h-100 align-items-center">
            <div class="col-6 d-flex justify-content-start contact-links-top">
                <span><i class="fa-solid fa-phone"></i> (51) 99999-9999</span>
                <a href="mailto:contato@veredict.com.br">
                    <i class="fa-solid fa-envelope"></i> contato@veredict.com.br
                </a>
            </div>
            <div class="col-6 d-flex justify-content-end social-links-top">
                <span class="social-label">Siga-nos:</span>
                <div class="icons-wrapper">
                    <a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div>
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
                        <button>Fale conosco</button>
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
                <a href="tel:51999999999" class="mobile-contact-item">
                    <i class="fa-solid fa-phone"></i> (51) 99999-9999
                </a>
                <div class="mobile-social-icons">
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

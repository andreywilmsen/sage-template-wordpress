<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_action('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    if (! Vite::isRunningHot()) {
        $dependencies = json_decode(Vite::content('editor.deps.json'));

        foreach ($dependencies as $dependency) {
            if (! wp_script_is($dependency)) {
                wp_enqueue_script($dependency);
            }
        }
    }
    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Disable on-demand block asset loading.
 *
 * @link https://core.trac.wordpress.org/ticket/61965
 */
add_filter('should_load_separate_core_block_assets', '__return_false');

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'top_menu' => __('Menu topo', 'sage'),
        'footer_menu' => __('Menu rodapé', 'sage')
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    add_theme_support('custom-logo', [
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => ['site-title', 'site-description'],
        'unlink-homepage-logo' => true,
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Register the theme customizer settings.
 */
function custom_register($wp_customize)
{
    $wp_customize->add_panel('general_customize', [
        'title' => 'Configurações Gerais',
        'priority' => 20
    ]);
    $wp_customize->add_panel('header_customize', [
        'title'    => 'Configurações de Cabeçalho',
        'priority' => 30
    ]);

    $wp_customize->add_panel('footer_customize', [
        'title' => 'Configurações de Rodapé',
        'priority' => 40
    ]);


    $wp_customize->add_section('contact_bar', [
        'title' => 'Barra de Contatos',
        'panel' => 'header_customize'
    ]);

    $wp_customize->add_section('menu_bar', [
        'title' => 'Barra de Menu',
        'panel' => 'header_customize'
    ]);

    $wp_customize->add_section('footer_customize', [
        'title' => 'Configurações gerais',
        'panel' => 'footer_customize'
    ]);

    $wp_customize->add_section('page_customize', [
        'title' => 'Configurações de páginas',
        'panel' => 'general_customize'
    ]);

    $fields = [
        // Cabeçalho
        'whatsapp_link' => ['Link para Whatsapp', 'contact_bar', 'url', ''],
        'instagram_link' => ['Link para Instagram', 'contact_bar', 'url', ''],
        'facebook_link' => ['Link para Facebook', 'contact_bar', 'url', ''],
        'telefone' => ['Telefone', 'contact_bar', 'text', ''],
        'email' => ['Email', 'contact_bar', 'email', ''],
        'cor_barra_contato' => ['Cor da barra', 'contact_bar', 'color', '#1D2327'],
        'cor_hover_links_contato' => ['Cor hover links', 'contact_bar', 'color', '#B59C6C'],
        'cor_texto_contato' => ['Cor textos', 'contact_bar', 'color', '#ededed'],
        'cor_barra_menu' => ['Cor da barra', 'menu_bar', 'color', '#FCFCFC'],
        'cor_hover_links_menu' => ['Cor hover links', 'menu_bar', 'color', '#B59C6C'],
        'cor_texto_menu' => ['Cor textos', 'contact_bar', 'color', '#000000'],
        'texto_botao_contato' => ['Texto botão fale conosco', 'menu_bar', 'text', 'Fale Conosco'],
        'cor_texto_botao_contato_menu' => ['Cor texto botão contato', 'menu_bar', 'color', '#FFFFF5'],
        'cor_fundo_botao_contato_menu' => ['Cor textos', 'menu_bar', 'color', '#B59C6C'],
        // Rodapé
        'cor_fundo_rodape' => ['Cor de fundo', 'footer_customize', 'color', '#1D2327'],
        'cor_titulos_rodape' => ['Cor dos títulos e Menu Pai', 'footer_customize', 'color', '#ffffff'],
        'cor_hover_geral' => ['Cor de destaque (Hover)', 'footer_customize', 'color', '#B59C6C'],
        'cor_texto_menu_filho' => ['Cor texto Filho', 'footer_customize', 'color', '#adb5bd'],
        'cor_hover_menu_filho' => ['Cor hover texto Filho', 'footer_customize', 'color', '#ffffff'],
        'cor_texto_menu_neto' => ['Cor texto Neto', 'footer_customize', 'color', '#adb5bd'],
        'cor_texto_contato' => ['Cor do texto contato', 'footer_customize', 'color', '#adb5bd'],
        'cor_icone_contato' => ['Cor do ícone contato', 'footer_customize', 'color', '#B59C6C'],
        'cor_borda_circulo_contato' => ['Cor da borda do círculo', 'footer_customize', 'color', 'rgba(255,255,255,0.1)'],
        'cor_fundo_circulo_contato' => ['Cor de fundo do círculo', 'footer_customize', 'color', 'transparent'],
        'cor_hover_texto_contato' => ['Cor hover texto contato', 'footer_customize', 'color', '#ffffff'],
        'cor_hover_icone_contato' => ['Cor hover ícone contato', 'footer_customize', 'color', '#1D2327'],
        'cor_hover_fundo_circulo_contato' => ['Cor hover fundo círculo', 'footer_customize', 'color', '#B59C6C'],
        'texto_titulo_contatos' => ['Título da coluna Contatos', 'footer_customize', 'text', 'Contatos'],
        'telefone_rodape' => ['Telefone', 'footer_customize', 'text', ''],
        'email_rodape' => ['Email', 'footer_customize', 'email', ''],
        // Páginas
        'cor_destaque_pagina' => ['Cores de destaque da página', 'page_customize', 'color', '#B59C6C'],
        'cor_texto_page_header' => ['Cores dos textos do cabeçalho de página', 'page_customize', 'color', '#212529'],


    ];
    foreach ($fields as $id => $data) {
        $wp_customize->add_setting($id, [
            'default' => $data[3],
            'sanitize_callback' => ($data[2] === 'color') ? 'sanitize_hex_color' : 'sanitize_text_field'
        ]);

        if ($data[2] === 'color') {
            $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, $id, [
                'label' => $data[0],
                'section' => $data[1],
            ]));
        } else {
            $wp_customize->add_control($id, [
                'label' => $data[0],
                'section' => $data[1],
                'type' => $data[2],
            ]);
        }
    }
}
add_action('customize_register', __NAMESPACE__ . '\\custom_register');

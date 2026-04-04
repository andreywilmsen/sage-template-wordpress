<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = [
        'sections.header',
    ];

    public function with()
    {
        return [
            'logotipo' => get_custom_logo(),
            'telefone' => get_theme_mod('telefone'),
            'telefone_link' => preg_replace('/\D/', '', get_theme_mod('telefone')),
            'email' => get_theme_mod('email'),
            'botao_contato' => get_theme_mod('texto_botao_contato'),
            'whatsapp_link'  => get_theme_mod('whatsapp_link'),
            'instagram_link' => get_theme_mod('instagram_link'),
            'facebook_link'  => get_theme_mod('facebook_link'),
        ];
    }
}

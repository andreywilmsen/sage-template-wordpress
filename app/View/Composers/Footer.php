<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    protected static $views = [
        'sections.footer'
    ];

    public function with()
    {
        return [
            'email' => get_theme_mod('email_rodape'),
            'telefone' => get_theme_mod('telefone_rodape')
        ];
    }
}

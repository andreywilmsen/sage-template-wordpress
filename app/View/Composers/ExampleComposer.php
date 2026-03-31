<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * Guia de Estrutura: View Composers (Controllers do Sage)
 * * Um Composer prepara os dados (o "cérebro") antes que a 
 * visualização (o "corpo" Blade) seja renderizada.
 */
class ExampleComposer extends Composer
{
    /**
     * ALVOS (Views)
     * Defina quais arquivos .blade.php receberão os dados deste Composer.
     * Use '.' para pastas: 'sections.header' mira em 'views/sections/header.blade.php'
     * Use '*' para tornar os dados globais (disponíveis em todo o site).
     */
    protected static $views = [
        'sections.header',
        'sections.footer',
        'template-custom',
    ];

    /**
     * DATA BINDING (Variáveis)
     * Tudo o que for retornado no array abaixo vira uma variável no Blade.
     * Exemplo: 'user_name' no PHP vira {{ $user_name }} no HTML.
     */
    public function with()
    {
        return [
            'example_string' => 'Valor estático ou de função',
            'example_list'   => $this->getExampleData(),
            'site_status'    => true,
        ];
    }

    /**
     * FUNÇÕES AUXILIARES (Lógica de Negócio)
     * Use funções privadas ou públicas para buscar dados do banco (WP_Query, ACF, etc).
     * Isso mantém a função with() limpa e organizada.
     */
    public function getExampleData()
    {
        // Exemplo de retorno de dados organizados
        return [
            ['id' => 1, 'label' => 'Item A'],
            ['id' => 2, 'label' => 'Item B'],
        ];
    }
}

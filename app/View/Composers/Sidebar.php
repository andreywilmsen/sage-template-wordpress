<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class Sidebar extends Composer
{
    protected static $views = [
        'sections.sidebar'
    ];

    public function with()
    {
        return [
            'recent_posts' => $this->getRecentPosts(),
        ];
    }

    public function getRecentPosts()
    {
        $query = new WP_Query([
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ]);

        return collect($query->posts)->map(function ($post) {
            return (object) [
                'title'     => get_the_title($post),
                'url'       => get_permalink($post),
                'date'      => get_the_date('d M, Y', $post),
                'content'   => wp_trim_words(get_the_content(null, false, $post), 20, '...'),
                'category'  => get_the_category($post->ID)[0]->name ?? 'News',
                'thumbnail' => get_the_post_thumbnail($post->ID, 'medium'),
                'minutes'   => $this->calculateReadTime($post->post_content),
            ];
        });
    }

    private function calculateReadTime($content)
    {
        $word_count = str_word_count(strip_tags($content));
        return ceil($word_count / 200) . ' min';
    }
}

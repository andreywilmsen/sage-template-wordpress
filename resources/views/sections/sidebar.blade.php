@php
    $color_accent_side_posts = get_theme_mod('cor_destaque_side_news');
@endphp

<style>
    :root {
        --color-accent-side-posts: {{ $color_accent_side_posts }};
    }
</style>

<aside class="sidebar-modern">
    <div class="sidebar-header">
        <h3 class="title">Últimos posts</h3>
    </div>

    <div class="vertical-stack">
        @foreach ($recent_posts as $post)
            <article class="card-vertical">
                <a href="{{ $post->url }}" class="card-link">
                    <div class="card-figure">
                        {!! $post->thumbnail !!}
                        <div class="card-badge">{{ $post->category }}</div>
                    </div>

                    <div class="card-content">
                        <div class="card-meta">
                            <span class="date">
                                <i class="fa-light fa-calendar"></i> {{ $post->date }}
                            </span>
                            <span class="read-time">
                                <i class="fa-light fa-timer"></i> {{ $post->minutes }}
                            </span>
                        </div>
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-excerpt">{{ $post->content }}</p>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
</aside>

<aside class="sidebar-modern">
    <div class="sidebar-header">
        <h3 class="title">Últimos posts</h3>
    </div>

    <div class="vertical-stack">
        @php
            $recent_posts = new WP_Query(['posts_per_page' => 3, 'post_status' => 'publish']);
        @endphp

        @while($recent_posts->have_posts()) @php($recent_posts->the_post())
            <article class="card-vertical">
                <a href="{{ get_permalink() }}" class="card-link">
                    <div class="card-figure">
                        {!! get_the_post_thumbnail(null, 'medium') !!}
                        <div class="card-badge">{{ get_the_category()[0]->name ?? 'News' }}</div>
                    </div>
                    
                    <div class="card-content">
                        <div class="card-meta">
                            <span class="date"><i class="fa-light fa-calendar"></i> {{ get_the_date('d M, Y') }}</span>
                            <span class="read-time"><i class="fa-light fa-timer"></i> 5 min</span>
                        </div>
                        <h4 class="card-title">{{ get_the_title() }}</h4>
                        <p class="card-excerpt">Confira os detalhes sobre este artigo e fique por dentro...</p>
                    </div>
                </a>
            </article>
        @endwhile
        @php(wp_reset_postdata())
    </div>
</aside>
<?php get_header(); ?>


    <main>
        <div class="content-container">
            <?php
            if (have_posts()) {
                // Load posts loop.
                while (have_posts()) {
                    the_post();
                    if (is_singular()) {
                        get_template_part('template-parts/articles/full');
                    } else {
                        get_template_part('template-parts/articles/excerpt');
                    }
                }

                if (!is_singular()) {
                    echo '<div class="puddinq-pagination">';
                    echo paginate_links();
                    echo '</div>';
                }
            }
            ?>
        </div>
        <aside>
            <?php
            if (is_active_sidebar('main-sidebar')) {
                dynamic_sidebar('main-sidebar');
            }
            ?>
        </aside>
    </main>
<?php get_footer(); ?>
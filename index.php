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
                    echo paginate_links();
                }
            }
            ?>
        </div>
        <aside>
            <ul>
                <li>Subject 1</li>
                <li>Link 1</li>
                <li>Link 2</li>
                <li>Link 3</li>
            </ul>
        </aside>
    </main>
<?php get_footer(); ?>
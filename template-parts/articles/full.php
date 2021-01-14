<?php

global $post;

?>
<section>
<h1><?= $post->post_title; ?></h1>

<?php the_content(); ?>
</section>

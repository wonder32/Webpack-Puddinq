<?php

global $post;

?>
<article>
<h2>
<a href="<?= $post->post_title; ?>" title="<?php printf(__('Read: %s', 'puddinq-com'), $post->post_title); ?>">
    <?= $post->post_title; ?>
</a></h2>
    <?php the_excerpt(); ?>
</article>

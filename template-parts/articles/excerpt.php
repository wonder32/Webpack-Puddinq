<?php

global $post;

?>
<article>
<h2>
<a href="<?= get_the_permalink($post->ID); ?>" title="<?php printf(__('Read: %s', 'puddinq-com'), $post->post_title); ?>">
    <?= $post->post_title; ?>
</a></h2>
    <?php the_post_thumbnail(array(80, 0), array( 'style' => 'float:left;margin:15px;' )); ?>
    <?php the_excerpt(); ?>
</article>

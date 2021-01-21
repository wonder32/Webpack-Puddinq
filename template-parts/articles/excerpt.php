<?php

global $post;
$user = get_user_by( 'id', $post->post_author);
?>
<article itemscope itemtype="https://schema.org/Article">
<h2 itemprop="name">
<a href="<?= get_the_permalink($post->ID); ?>" title="<?php printf(__('Read: %s', 'puddinq-com'), $post->post_title); ?>">
    <?= $post->post_title; ?>
</a></h2>
    <div class="article-meta">
        <?= __('by:', 'puddinq-com') ?> <span itemprop="author"><?= $user->display_name; ?></span>
        <?= __('on:', 'puddinq-com') ?> <span itemprop="publisher">Puddinq.com</span>
        <?= __('published:', 'puddinq-com') ?> <time datetime="2010-07-03" itemprop="datePublished"><?= date_i18n('j F Y', strtotime($post->post_date)); ?></time>
    </div>
    <div  itemprop="description">
    <?php the_post_thumbnail(array(80, 0), array( 'style' => 'float:left;margin:15px;' )); ?>
    <?php the_excerpt(); ?>
    </div>
</article>

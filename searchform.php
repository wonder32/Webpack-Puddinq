<form role="search" aria-label="Search in www.puddinq.com" method="get" class="search-form" action="<?= esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="screen-reader-text" style="display:none"><?php _e('Search for:', 'puddinq-com'); ?></span>
    <input type="search" class="search-field" placeholder="<?php _e('Search query', 'puddinq-com'); ?>" value="<?= get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="search-submit" value="<?php _e('Search', 'puddinq-com'); ?>" />
</form>';
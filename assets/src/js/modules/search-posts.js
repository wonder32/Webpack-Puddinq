import $ from 'jquery';
export {searchPosts};

function searchPosts(term, suggest) {
    $.ajax({
        // we get my_plugin.ajax_url from php, ajax_url was the key the url the value
        url: ajaxData.ajax_url,

        type: 'post',
        data: {
            // remember_setting should match the last part of the hook (2) in the php file (4)
            action: 'ajax_get_posts',
            nonce: ajaxData.nonce,
            search: term,
        },

        success: function(response) {
            //cache[ term ] = response;
            suggest(response);
        },
    });
}

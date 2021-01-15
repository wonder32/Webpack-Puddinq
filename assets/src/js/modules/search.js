import $ from 'jquery';

export {search};

function p_get_posts(term, suggest) {


    $.ajax({
        // we get my_plugin.ajax_url from php, ajax_url was the key the url the value
        url : aj_data.ajax_url,

        type : 'post',
        data : {
            // remember_setting should match the last part of the hook (2) in the php file (4)
            action : 'p_get_posts',
            nonce  : aj_data.nonce,
            search : term
        },

        success : function( response ) {
            cache[ term ] = response;
            suggest(response);

        }
    });

}function p_get_posts(term, suggest) {


    $.ajax({
        // we get my_plugin.ajax_url from php, ajax_url was the key the url the value
        url : aj_data.ajax_url,

        type : 'post',
        data : {
            // remember_setting should match the last part of the hook (2) in the php file (4)
            action : 'p_get_posts',
            nonce  : aj_data.nonce,
            search : term
        },

        success : function( response ) {
            cache[ term ] = response;
            suggest(response);

        }
    });

}

function search() {
    $(document).ready(function () {
        // Select search box
        $('.search-field').autocomplete({
            minLength: 3,
            source: function(term, suggest) {
                var termout = term.term;
                if (termout in cache) {
                    suggest(cache[termout]);
                    return;
                }
                p_get_posts(term, suggest);
            },
            focus: function(event, ui) {
                $(".search-field").val(ui.item.label.replace(/(<([^>]+)>)/ig, ""));
                return false;
            },
            select: function (event, ui) {
                window.location.href = ui.item.link;
            }
        })
    });
}

import {searchPosts} from './search-posts';

export {search};

let cache = {};


function search() {
    $('.search-field').autocomplete({
        minLength: 3,
        source: function(term, suggest) {
            let termout = term.term;
            if (termout in cache) {
                suggest(cache[ termout ]);
                return;
            }
            searchPosts(term, suggest);
        },
        focus: function(event, ui) {
            if ($('.search-field').val(ui.item.label.replace(/(<([^>]+)>)/ig,''))) {
                return false;
            }
        },
        select: function(event, ui) {
            window.location.href = ui.item.link;
        }
    });
}

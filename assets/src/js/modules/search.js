import {searchPosts} from './search-posts';
import $ from 'jquery';
export {search};

const cache = {};

function search() {
    $('.search-field').autocomplete({
        open() {
            $('ul.ui-menu').width($(this).innerWidth() * 1.6);
        },
        minLength: 3,
        source(term, suggest) {
            const termout = term.term;
            if (termout in cache) {
                suggest(cache[ termout ]);
                return;
            }
            searchPosts(term, suggest);
        },
        focus(event, ui) {
            if ($('.search-field').val(ui.item.label.replace(/(<([^>]+)>)/ig, ''))) {
                return false;
            }
        },
        select(event, ui) {
            window.location.href = ui.item.link;
        },
    });
    $('.search-field').autocomplete(
        'option', 'position', {my: 'center top', at: 'left bottom'}
    );
}

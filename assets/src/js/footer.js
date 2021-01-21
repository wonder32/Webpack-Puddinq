import '../scss/footer.scss';
import $ from 'jquery';
import {search} from './modules/search';
import {monkeyPatchAutocomplete} from './modules/search-styling';

$(document).ready(function() {
    /**
     * highlight autocomplete matches
     */
    monkeyPatchAutocomplete();

    /**
     * initiate search based on keyup search field
     */
    search();
});

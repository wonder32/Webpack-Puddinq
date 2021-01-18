import '../scss/footer.scss';
import {search} from './modules/search';
import {monkeyPatchAutocomplete} from './modules/search-styling';

$(document).ready(function() {
    monkeyPatchAutocomplete();
    search();
});

export {monkeyPatchAutocomplete};

function monkeyPatchAutocomplete() {
    $.ui.autocomplete.prototype._renderItem = function(ul, term) {
        const split = this.term.split(' ');

        if (1 in split && ! (split[ 1 ] === null) && split[ 1 ].length > 2) {
            for (let i = 0; i < split.length; i++) {
                const re = new RegExp(split[ i ], 'gi');
                term.label = term.label.replace(re, "<span style='font-weight:bold;color:Blue;'>" +
                    split[ i ] +
                    '</span>');
            }
        } else {
            this.term = $.trim(this.term);
            const re = new RegExp(this.term, 'gi');
            term.label = term.label.replace(re, "<span style='font-weight:bold;color:Blue;'>" +
                this.term + '</span>');
        }
        return $('<li></li>')
            .data('term.autocomplete', term)
            .append('<a>' + term.label + '</a>')
            .appendTo(ul);
    };
}

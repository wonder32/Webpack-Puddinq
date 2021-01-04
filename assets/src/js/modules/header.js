import $ from "jquery";

export {header};

function header() {

    $( document ).ready(function() {
        $('body').css('background', 'blue');
        console.log('this file is run by header.script.js');
        console.log('the source of this file is in /src/modules/header.js');

        $('main').on('click', function() {
           console.log('lekker');
        });

    });

}
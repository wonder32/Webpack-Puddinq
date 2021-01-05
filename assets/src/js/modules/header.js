import $ from "jquery";

export {header};

function header() {

    $( document ).ready(function() {
        $('body').css('background', 'yellow');

        $('main').on('click', function() {
           console.log('nice');
        });

    });

}
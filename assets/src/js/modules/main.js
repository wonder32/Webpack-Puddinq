import $ from "jquery";

export {main};

function main() {

    $( document ).ready(function() {
        $('body').css('background', 'green');

        $('main').on('click', function() {
           console.log('nice');
        });

    });

}
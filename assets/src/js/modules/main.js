import $ from 'jquery';

export { main };

function main() {

    $(document).ready(function() {

    $('main').on('click', function() {
      console.log('nice');
    });
  });
}

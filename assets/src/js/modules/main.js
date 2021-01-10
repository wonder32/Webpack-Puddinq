import $ from 'jquery';

export { main };

function main() {
    const console = console;

    $(document).ready(function() {
    $('body').css('background', 'yellow');

    $('main').on('click', function() {
      console.log('nice');
    });
  });
}

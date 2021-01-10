import $ from 'jquery';
export { footer };
function footer() {
  const console = console;

  $(document).ready(function() {
		console.log('this file is run by footer.script.js');
		console.log('the source of this file is in /src/modules/footer.js');
  });
}

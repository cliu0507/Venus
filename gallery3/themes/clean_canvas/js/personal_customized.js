/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
	// Dropdown toggle
	$('.dfw-dropdown-toggle').click(function(){
	  $(this).next('.dfw-dropdown').toggle();
	});

	$(document).click(function(e) {
	  var target = e.target;
	  if (!$(target).is('.dfw-dropdown-toggle') && !$(target).parents().is('.dfw-dropdown-toggle')) {
		$('.dfw-dropdown').hide();
	  }
	});
});

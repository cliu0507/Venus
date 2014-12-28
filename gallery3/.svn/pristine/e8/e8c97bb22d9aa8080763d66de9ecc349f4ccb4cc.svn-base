 $(document).ready(function() {
	$('.like_button').mouseenter(function(e) {
        $('.tooltip').show();
		$('.ilikethis').fadeIn(200);
	}).mouseleave(function(e) {
		$('.ilikethis').fadeOut(200);
		$('.tooltip').hide();
	});
	$('.dislike_button').mouseenter(function(e) {
		$('.tooltip2').show();
		$('.idislikethis').fadeIn(200);
	}).mouseleave(function(e) {
	   $('.tooltip2').hide();
		$('.idislikethis').fadeOut(200);
	});
	
	$('.totalstatsbutton').livequery("mouseenter", function(e){
		$('.greenBar').css("background-color","#AADA37");
		 $('.redbar').css("background-color","#CF362F");
		$('.tooltip3').show();
		$('.totalstats').fadeIn(200);
	}).livequery("mouseleave", function(e){
		$('.tooltip3').hide();
		$('.greenBar').css("background-color","#DDDDDD");
		$('.redbar').css("background-color","#DDDDDD");
		$('.totalstats').fadeOut(200);
	});
});

$(document).ready(function(){	
	//$('#voting_result').fadeOut();
	$('button').click(function(){
		var a = $(this).attr("id");
		
		$.post("voting.php?value="+a, {
		}, function(response){
			$('#voting_result').fadeIn();
			$('#voting_result').html($(response).fadeIn('slow'));
			// now update box bar			
			$.post("update_box.php", {
			}, function(update){
				$('#update_count').html(unescape(update));				
			});
			////////////
			// now update tooltip count			
			$.post("update_tooltip.php", {
			}, function(updates){
				$('.tooltip3').html(unescape(updates));				
			});
			////////////
		});
	});	
});	

$(document).ready(function(){	
$('.close').click(function(){
		$('#voting_result').fadeOut();
	});	
});	

function hideMesg(){

	$('.rating_message').fadeOut();
	$.post("rating.php?show=1", {
	}, function(response){
		$('#inner').html(unescape(response));
		$('#inner').fadeIn('slow');
	});
}	


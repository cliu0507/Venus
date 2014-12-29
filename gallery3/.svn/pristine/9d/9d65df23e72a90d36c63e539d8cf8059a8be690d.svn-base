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
});

function vote(type, itemid) {
  $.post("comments/vote" + type + "/" + itemid, {}, function(response) {
    if (response.result === "success") {
      var result = "likes: " + response.likes;
      result += "; dislikes: " + response.dislikes;
    }
  });
};

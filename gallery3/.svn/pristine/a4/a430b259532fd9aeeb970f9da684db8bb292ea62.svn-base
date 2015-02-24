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

function voteChallenge(type, challengeId, albumId) {
  $.post("comments/voteChallenge" + type + "/" + challengeId + "/" + albumId, {}, function(response) {
    if (response.result === "success") {
      var curValue = document.getElementById('challengeVote-' + challengeId).innerHTML;
	  var parseRes = curValue.split(" ");
	  
	  if(type == 'Left') {
		  document.getElementById('challengeVote-' + challengeId).value = (parseRes[0] + 1) + " votes VS " + parseRes[3] + " votes";
	  }
	  else {
		  document.getElementById('challengeVote-' + challengeId).value = parseRes[0] + " votes VS " + (parseRes[3] + 1) + " votes";
	  }
    }
  });
};

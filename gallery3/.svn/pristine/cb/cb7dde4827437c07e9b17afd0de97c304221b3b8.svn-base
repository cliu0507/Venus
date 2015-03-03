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
		  var newStr = (parseInt(parseRes[0]) + 1) + " votes VS " + parseRes[3] + " votes";
		  
		  document.getElementById('voteLeft-' + challengeId).disabled = true;
		  document.getElementById('voteLeft-' + challengeId).className = "like_button_clicked";
		  document.getElementById('challengeVote-' + challengeId).innerHTML = newStr;
	  }
	  else {
		  var newStr = parseRes[0] + " votes VS " + (parseInt(parseRes[3]) + 1) + " votes";
		  
		  document.getElementById('voteRight-' + challengeId).disabled = true;
		  document.getElementById('voteRight-' + challengeId).className = "like_button_clicked";
		  document.getElementById('challengeVote-' + challengeId).innerHTML = newStr;
	  }
    }
  });
};

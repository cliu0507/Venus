<script type="text/javascript">
$(document).ready(function(){	
$('.close').click(function(){
		$('#voting_result').fadeOut();
	});	

});	
</script>
<?php
//include("dbcon.php");
$userip = $_SERVER['REMOTE_ADDR'];

if($_REQUEST['value'])
{
	$value = mysql_escape_string($_REQUEST['value']);
	if($value)
	{
	//	$result = mysql_query("select userip from youtube_ip where userip='$userip'");
	//	$num = mysql_num_rows($result);
		$num = 1;
	}
	
	if($num==0)
	{
		if($value == 'like')
		{
			$query = "update youtube_rating set liked = liked+1 where id = 1";
		}
		else
		{
			$query = "update youtube_rating set dislike = dislike+1 where id = 1";
		}
		
		mysql_query( $query);
		
		$que = "insert into youtube_ip (userip) values ('$userip')";
		mysql_query( $que);
	}
	if($value == 'like')
	{
		$what = 'like';
	}
	else
	{
		$what = 'dislike';
	}
/*	$result=mysql_query("select * from youtube_rating");
	
	$row=mysql_fetch_array($result);
	//$gettotal = mysql_num_rows($result);
	
	$gettotal = $row['dislike'] + $row['liked'];
	
	$dislike=$row['dislike'];
	
	$like=$row['liked'];
	
	$likes=($like*100)/$gettotal;
	
	$dislikes=($dislike*100)/$gettotal;?>*/
	$gettotal = 1000;
	$dislike = 100;
	$like = 900;
	$likes=($like*100)/$gettotal;
	$dislikes=($dislike*100)/$gettotal;?>

	<div class="mesgbox">You <?php echo $value?> this Article </div>
	<div class="close">X</div>
	
	<br clear="all" />
	<div style="margin-left:30px; color:#000000; font-size:12px;">Ratings for this Article 
	<span style="color:#999999">(<?php echo $gettotal?> total)</span>
	</div>
	
	<div class="thumbUp">
		<div style="margin-top:5px;"><?php echo $like?> </div><div class="bigGreenBar" style="width:<?php echo $likes?>px">&nbsp;</div>
	</div>
	<div class="thumbDown">
		<div style="margin-top:5px;"><?php echo $dislike?> </div><div class="bigRedBar" style="width:<?php echo $dislikes?>px">&nbsp;</div>
	</div>
	<?php
}?>


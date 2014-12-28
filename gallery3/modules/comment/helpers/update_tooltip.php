<?php
/*
include("dbcon.php");
$result=mysql_query("select * from youtube_rating");

$row=mysql_fetch_array($result);

$dislike=$row['dislike'];

$like=$row['liked'];
*/
$dislike=100;
$like=900;
?>
<span class="totalstats">
<?php echo $like?>  likes, <?php echo $dislike?>  dislikes
</span>


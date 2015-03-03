
<html>
<body>
<font color="#FF0000"> <h2>Your command is :</h2> </font>  
<?php
if (!empty($_GET["Add"])) { $command = "add:1:" . $_GET["Add"] . ":/home/wtfm2000/share/picture/" . $_GET["Add"] . ".jpg"; echo "SUCCESS"; exit();} 
else if(!empty($_GET["Delete"])) { $command = "del:1:" . $_GET["Delete"]; echo "SUCCESS";exit(); }
else if(!empty($_GET["ID"])) {$command = "query_id:1:" . $_GET["ID"] . ":10";  echo $command;  } 
else {$command = "query_path:1:10:/home/wtfm2000/share/imgMatchServer/picture/" . $_GET["path"] . ".jpg";  echo $command;}
?>
<font color="#FF0000"> <h2>Your original picture is :</h2> </font> 
<?php 
if (!empty($_GET["ID"])) {$original = "../picture/" . $_GET["ID"] . ".jpg";} 
else {$original = "../picture/" . $_GET["path"] . ".jpg";};
?>
<img src="<?php echo($original);?>" style="width:220px;height:256px"/>
<font color="#FF0000"> <h2>Your result is :</h2> </font>
<body bgcolor="#CCFFCC">
</body>
</html>
<?php
$fp = stream_socket_client("tcp://127.0.0.1:9117", $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    fwrite($fp, $command);
    while (!feof($fp)) {
 $str = fgets($fp, 1024);
$img = explode(';',$str,-1);
$x = 0;
foreach($img as $picture){
$a = strpos($picture,":");
$b[$x] = substr($picture,0,$a );
$c[$x] = substr($picture,$a+1);
$x++;
}
    }
    fclose($fp);
}

$imagename = array("../picture/$b[0].jpg","../picture/$b[1].jpg","../picture/$b[2].jpg","../picture/$b[3].jpg","../picture/$b[4].jpg","../picture/$b[5].jpg","../picture/$b[6].jpg","../picture/$b[7].jpg","../picture/$b[8].jpg","../picture/$b[9].jpg");

?>
<img src="<?php echo($imagename[9]);?>" style="width:220px;height:256px"/>
<?php echo $c[9];?>
<img src="<?php echo($imagename[8]);?>" style="width:220px;height:256px"/>
<?php echo $c[8];?>
<img src="<?php echo($imagename[7]);?>" style="width:220px;height:256px"/>
<?php echo $c[7];?>
<img src="<?php echo($imagename[6]);?>" style="width:220px;height:256px"/>
<?php echo $c[6];?>
<img src="<?php echo($imagename[5]);?>" style="width:220px;height:256px"/>
<?php echo $c[5];?>
<img src="<?php echo($imagename[4]);?>" style="width:220px;height:256px"/>
<?php echo $c[4];?>
<img src="<?php echo($imagename[3]);?>" style="width:220px;height:256px"/>
<?php echo $c[3];?>
<img src="<?php echo($imagename[2]);?>" style="width:220px;height:256px"/>
<?php echo $c[2];?>
<img src="<?php echo($imagename[1]);?>" style="width:220px;height:256px"/>
<?php echo $c[1];?>
<img src="<?php echo($imagename[0]);?>" style="width:220px;height:256px"/>
<?php echo $c[0];?>
<form action="welcome.php" method="post">







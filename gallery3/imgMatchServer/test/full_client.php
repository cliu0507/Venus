
<!DOCTYPE HTML>
<html> 
<body>

<?php
echo "Add image<br>";
?>  
<form action="myfashion.php" method="get">
Command: <input type="text" name="Add"><br>
<input type="submit">
</form>

<?php
echo "Delete image<br>";
?>  
<form action="myfashion.php" method="get">
Command: <input type="text" name="Delete"><br>
<input type="submit">
</form>

<?php
echo "Query image by id<br>";
?>  
<form action="myfashion.php" method="get">
Command: <input type="text" name="ID"><br>
<input type="submit">
</form>

<?php
echo "Query image by path<br>";
?>  
<form action="myfashion.php" method="get">
Command: <input type="text" name="path"><br>
<input type="submit">
</form>
</body>
</html>
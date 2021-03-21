<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php");
}


?>
<!DOCTYPE html>
<html>
<body>
<h2>Home Page</h2>
<h3><?php echo $_SESSION["username"];?></h3>
<h5>Do you want to go to <a href="pagetwo.php">Profile</a></h5>
<br>
<h5>Do you want to <a href="../control/logout.php">logout</a></h5>
</body>
</html>
<?php
?>   

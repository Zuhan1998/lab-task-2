<?php
include('../control/logincheck.php');
if(isset($_SESSION['username'])){
header("location: pageone.php");}
?>


<!DOCTYPE html>
<html>
<body>
<form action="" method="post">
    <input type="text" name="username" placeholder="Enter uname" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input name="submit" type="submit" value="LOGIN">
</form><br><br>
<?php echo $error; ?>
<br>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<body>



<?php

include('db.php');
session_start();


$validatename="";
$validateemail="";
$validateusername="";
$validateradio="";
$validatepassword = "";
$validatecpassword = "";
$gender="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $username=$_REQUEST["username"];

    $password = $_REQUEST["password"];
   $cpassword = $_REQUEST["cpassword"];

    if(empty($name))
    {
        $validatename=" Your name isn't valid";

    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $validateemail=" You Must Enter Your email";
    }




  elseif($password!=$cpassword){
        $validatecpassword = "Password doesn't match.";

    }


  elseif (empty($password) || empty($cpassword)) {
    $validatepass=" Your password isn't valid";
}
  elseif(empty($username)|| (strlen($username))<5)
  {
      $validateusername=" Your username isn't valid";


  }



    elseif(!isset($_REQUEST["gender"]))
    {
        $validateradio= "Please select one";
    }
    else
    {
      $connection = new db();
      $conobj = $connection->OpenCon();
        $userQuery = $connection->InsertUser($conobj, "student", $name,$email, $username, $password,$gender);

    }
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<table>
<tr><td> Name: </td>
<td><input type="text" name="name">
<br>
<?php echo $validatename;?></td></tr>


<tr><td> Email: </td>
<td><input type="email" name="email">
<br>
<?php echo $validateemail;?></td></tr>

<tr><td> Username: </td>
<td><input type="text" name="username">
  <?php echo $validateusername; ?></td></tr>

<tr><td> Password: </td>
<td><input type="password" name="password"><?php echo $validatepassword;?></td></tr>


<tr><td> Confirm Password: </td>
<td><input type="password" name="cpassword"><?php echo $validatecpassword;?></td></tr>


</table>

<br>
<p1><strong>Gender</strong></p1>
<br>
<input type="radio" id="male" name="gender" value="Male">
<label for="male">Male</label><br>
<?php echo $validateradio; ?>
<input type="radio" id="female" name="gender" value="Female">
<label for="female">Female</label> <br>
<?php echo $validateradio; ?>
<input type="radio" id="other" name="gender" value="Other" >
<label for="other">Other</label> <br>
<?php echo $validateradio; ?>

<input type="submit" value="SUBMIT">
</form>

<?php


?>

</body>
</html>

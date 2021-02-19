<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<body>

<?php
$validatefields="";
$validatename="";
$validateemail="";
$validateusername="";
$validatepassword="";
$validatecheckbox="";
$validateradio="";
$validatedate="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_REQUEST["firstname"];
    $email=$_REQUEST["email"];
    if(empty($name) || !preg_match("/^([A-Za-z]{5,})/ix",$name))
    {
        $validatename="Please enter valid name!!!";
        $validatefields="Empty";
    }
    else
    {
        $validatename="Your Name is: ".$name;
    }
    if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
    {
        $validateemail="Please enter a valid email!!!";
        $validatefields="Empty";
    }
    else
    {
        $validateemail="Your Email Address is: ".$email;
    }
    $username=$_REQUEST["username"];
    if(empty($username) || !preg_match("/^([A-Za-z0-9\.*\-*\_*]{5,})/ix",$username))
    {
        $validatefields="Empty";
        $validateusername="Please enter valid username!!!";
        if(strlen($username)<5)
        {
            $validateusername="Name must have at least 5 characters!!!";
        }
    }
    else
    {
        $validateusername="Your User Name is: ".$username;
    }
    $password=$_REQUEST["password"];
    $confirmpass=$_REQUEST["confirmPassword"];
    if(strlen($password)<8 || !preg_match("/^((.*)([@|#|$|%]+)(.*))/ix",$password))
    {
        $validatefields="Empty";
        $validatepassword="Password must contain one special character!!!";
        if(strlen($password)<8)
        {
            $validatepassword="Password must have at least 8 characters!!!";
        }
    }
    elseif($password == $confirmpass)
    {
        $validatepassword="Your Password is: ".$password;
    }
    else
    {
        $validatefields="Empty";
        $validatepassword="Please confirm your password properly";
    }
   
    if(!isset($_REQUEST["gender"]))
    {
        $validatefields="Empty";
        $validateradio="Please specify gender!!!";
    }
    else
    {
        $validateradio="Gender is ".$_REQUEST["gender"];
    }

    if(empty($_REQUEST["dd"]))
    {
        $validatefields="Empty";
        $validatedate="Please specify date!!!";
    }
    else
    {
        $validatedate="Date is ".$_REQUEST["dd"];
    }

    if($validatefields=="Empty")
    {
        $validatefields="All fields are required!";
    }
}
?>

<h1>My Registration Page</h1>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<table><td><?php echo $validatefields; ?></td>
<tr> <td>First Name</td>
<td>:<input type="text" name="firstname"></td><td><?php echo $validatename; ?></td>
</tr>

<tr> <td>Email</td>
<td>:<input type="text" name="email"></td><td><?php echo $validateemail; ?></td>
</tr>

<tr> <td>User Name</td>
<td>:<input type="text" name="username"></td><td><?php echo $validateusername; ?></td>
</tr>

<tr> <td>Password</td>
<td>:<input type="password" name="password"></td><td><?php echo $validatepassword; ?></td>
</tr>

<tr> <td>Confirm Password</td>
<td>:<input type="password" name="confirmPassword"></td>
</tr>

<tr><td>Gender</td>
</tr>

<tr><td><input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female <input type="radio" name="gender" value="Other">Other</td><td><?php echo $validateradio; ?></td>
</tr>

<tr><td>Date of Birth</td>
</tr>

<tr><td><input type="date" name="dd">(dd/mm/yyyy)</td><td><?php echo $validatedate; ?></td>
</tr>
<tr></tr>
<tr>
<td><input type="submit" value="SUBMIT"> <input type="RESET" value="RESET"></td>
</tr>
</table>
</form>
</body>
</html>
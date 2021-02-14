<!DOCTYPE html>
<html>
<body>
<?php
$validatename="";
$validateemail="";
$validatecheckbox="";
$validateradio="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_REQUEST["fname"];
    $email=$_REQUEST["email"];
    if(empty($name))
    {
        $validatename="Please enter name!!!";
    }
    else
    {
        $validatename="Your Name is: ".$name;
    }
    if(empty($email))
    {
        $validateemail="Please enter a valid email!!!";
    }
    else
    {
        $validateemail="Your Email Address is: ".$email;
    }

   
    if(!isset($_REQUEST["vehicleB"])&&!isset($_REQUEST["vehicleC"])&&!isset($_REQUEST["vehicleBo"]))
    {
        $validatecheckbox="You must select at least one!!!";
    }
    else
    {
        if(isset($_REQUEST["vehicleB"]))
        {
            $v1=$_REQUEST["vehicleB"];
            $validatecheckbox=$validatecheckbox.$v1." ";
        }
        if(isset($_REQUEST["vehicleC"]))
        {
            $v2=$_REQUEST["vehicleC"];
            $validatecheckbox=$validatecheckbox.$v2." ";
        }
        if(isset($_REQUEST["vehicleBo"]))
        {
            $v3=$_REQUEST["vehicleBo"];
            $validatecheckbox=$validatecheckbox.$v3." ";
        }
    }

    if(!isset($_REQUEST["gender"]))
    {
        $validateradio="Please specify gender!!!";
    }
    else
    {
        $validateradio=$_REQUEST["gender"];
    }
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
Enter your first name: <input type="text" name="fname"> <?php echo $validatename; ?>
<br>
Enter your email     : <input type="text" name="email"> <?php echo $validateemail; ?>
<br>
Your Optins: 
<br>
<input type="checkbox" id="vehicle1" name="vehicleB" value="Bike">
<label for="vehicle1"> I have a Bike</label>
<br>
<input type="checkbox" id="vehicle2" name="vehicleC" value="Car">
<label for="vehicle2"> I have a Car</label>
<br>
<input type="checkbox" id="vehicle3" name="vehicleBo" value="Boat">
<label for="vehicle3"> I have a Boat</label>
<br><?php echo $validatecheckbox; ?>
<br>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Other">Other
<br><?php echo $validateradio; ?>
<br>
<input type="submit" value="SUBMIT">
</form>

</body>
</html>
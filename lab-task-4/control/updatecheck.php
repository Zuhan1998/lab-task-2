<?php
include('../model/db.php');


 $error="";
 $interststring="";
if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email'])) {
$error = "invalid input";
}
else
{
if(isset($_POST["interest1"])||isset($_POST["interest2"])||isset($_POST["interest3"]))
{
    if(isset($_POST["interest1"]))
    {
        $interststring=$_POST["interest1"].",";
    }
    if(isset($_POST["interest2"]))
    {
        $interststring=$interststring.$_POST["interest2"].",";
    }
    if(isset($_POST["interest3"]))
    {
        $interststring=$interststring.$_POST["interest3"].",";
    }
}
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->UpdateUser($conobj,"student",$_SESSION["username"],$_POST['firstname'],$_POST['email'],$_POST['password'],$_POST['address'],$_POST['dob'],$_POST['gender'],$_POST['profession'],$interststring);
if($userQuery==TRUE)
{
    echo "updated"; 
}
else
{
    echo "not updated";    
}
$connection->CloseCon($conobj);

}
}


?>
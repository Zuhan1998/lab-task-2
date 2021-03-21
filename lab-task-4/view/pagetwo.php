<?php
session_start(); 

include('../control/updatecheck.php');

if(empty($_SESSION["username"])) 
{header("Location: ../control/login.php");}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Profile</h2>
<h3><?php echo $_SESSION["username"];?></h3>
<br>
<?php
$radio1=$radio2=$radio3="";
$dropdown1=$dropdown2=$dropdown3=$dropdown4="";
$checkbox1=$checkbox2=$checkbox3="";
$firstname=$email="";
$password=$address=$dob="";
$profession;
$interests;
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $password=$row["password"];
      $address=$row["address"];
      $dob=$row["dob"];
      $profession=$row["profession"];
      $interests=explode(",",$row["interests"]);
      $num_interest=count($interests);
      $calcnt=0;
      while($num_interest>0)
      {
        if($interests[$calcnt]=='music')
        {
          $checkbox1="checked";
        }
        elseif($interests[$calcnt]=='sports')
        {
          $checkbox2="checked";
        }
        elseif($interests[$calcnt]=='reading')
        {
          $checkbox3="checked";
        }
        $num_interest--;
        $calcnt++;
      }
     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      if(  $profession=="Academician" )
      { $dropdown1="selected"; }
      else if($profession=="Student")
      { $dropdown2="selected"; }
      else if($profession=="Engineer")
      { $dropdown3="selected"; }
      else{$dropdown4="selected";}
  } 
}
  else {echo "0 results";}
?>
<form action='' method='post'>
Firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" > <br>

Email : <input type='text' name='email' value="<?php echo $email; ?>" > <br>
 Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php echo $radio3; ?> > Other <br>
Password: <input type='text' name='password' value="<?php echo $password; ?>" ><br>
Date Of Birth: <input type='date' name='dob' value="<?php echo $dob; ?>"><br>
Address: <input type='text' name='address' value="<?php echo $address; ?>"><br>
Profession: 
            <select name="profession" >
              <option value="" <?php $dropdown4; ?>>Please Specify One</option>
              <option value="Academician" <?php echo $dropdown1; ?>>Academician</option>
              <option value="Student" <?php echo $dropdown2; ?>>Student</option>
              <option value="Engineer" <?php echo $dropdown3; ?>>Engineer</option>
            </select> <br>
Interests: 
  <br><input type="checkbox" name="interest1" value="music" <?php echo $checkbox1; ?>>
  <label for="music"> Music</label><br>
  <input type="checkbox" name="interest2" value="sports" <?php echo $checkbox2; ?>>
  <label for="sports"> Sports</label><br>
  <input type="checkbox" name="interest3" value="reading" <?php echo $checkbox3; ?>>
  <label for="reading"> Reading</label><br><br>

     <input name='update' type='submit' value='Update'>  
     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back</a>
<a href="../control/logout.php"> logout</a>
</body>
</html>
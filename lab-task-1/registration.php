<!DOCTYPE HTML>
<html>

<head>
<title> Registration Page </title>
</head>

<body>
<h1> MY REGISTRATION PAGE </h1>
<form>
<table>
<tr> <td>Name</td> 
<td>:<input type="text" name="firstname"></td></tr><br><br>
<td>Email</td>
<td>:<input type="text" name="email"></td></tr>
<td>User Name</td>
<td>:<input type="text" name="username"></td></tr>
<td>Password</td>
<td>:<input type="password" name="password"></td></tr>
<td>Confirm Password</td>
<td>:<input type="password" name="confirmpassword"></td></tr>
<td>Gender</td>
<tr>
<td>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
</td></tr>
<td>Date of Birth</td>
<tr>
<td>
<input type="date" id="date" name="date of birth">
</td></tr>
<td><input type="submit" value="Submit">
<input type="submit" value="Reset"></td>
</table>
</form>

</body>

</html>
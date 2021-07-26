<?php
include('control.php');
?>

<html>
<body>
<form action="" method="post">
<table align="center" border="2">
<caption>Registration Form</caption>

<tr>
<td>User Name</td>
<td><input type="text" name="unm" value="<?php
if(isset($_COOKIE['user']))
{
	echo $_COOKIE['user'];
}
?>"></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="pass" value="<?php
if(isset($_COOKIE['pass']))
{
	echo $_COOKIE['pass'];
}
?>"></td>
</tr>

<tr>
<td>Remember Me</td>
<td><input type="checkbox" name="rm"></td>
</tr>
<tr>
    <td><input type="submit" name="login" value="login"></td>
</tr>


</table>
</form>
</body>
</html>

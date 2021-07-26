<?php
include('control.php');
?>
<html>
<head>
<style>
body{ background-image: url("modern-abstract-background_1048-1003.jpg");
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 1350px 660px;}
table{
	border:5px blue dotted;
	width:500px;
	height:400px;
	padding:10px;
	font-size:20px;
	box-shadow:10px 10px 10px black;
}
caption{
	color:white;
	padding:10px;
	font-size:25px;
	background-color:skyblue;
	border:5px blue dotted;
	text-shadow:10px 10px 10px black;
}
</style>
</head>
<body bgcolor="lightyellow">
<center>
<form method="post" action="" enctype="multipart/form-data">
<table>
<caption>Create New Account</caption>
<tr>
<td>Name</td>
<td><input type="text" name="name" required></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="pass" required></td>
</tr>

<tr>
<td>Email</td>
<td><input type="email" name="email" required></td>
</tr>

<tr>
<td>Gender</td>
<td>Male <input type="radio" name="gen" value="Male">| Female <input type="radio" name="gen" value="Female"></td>
</tr>

<tr>
<td>Birth Date</td>
<td><input type="text" name="dob" required></td>
</tr>

<tr>
<td>Langauge</td>
<td><input type="checkbox" name="lag[]" value="Gujarati"> Gujarati | <input type="checkbox" name="lag[]" value="Hindi"> Hindi | <input type="checkbox" name="lag[]" value="English"> English</td>
</tr>

<tr>
<td>Country</td>
<td><select name="cid">
<?php 
foreach($country as $cou)
{
?>
	<option value="<?php echo $cou->cid; ?>">
	<?php echo $cou->cnm ; ?>
	</option>
<?php } ?>
	</select>
</td>
</tr>

<tr>
<td>Image Upload</td>
<td><input type="file" name="file1" required></td>
</tr>

<tr>
<td><button name="submit">Submit</button></td>
</tr>
</table>
</form>
</center>
</body>
</html>
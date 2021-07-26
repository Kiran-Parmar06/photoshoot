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
<td><input type="text" name="unm"></td>
</tr>


<tr>
<td>Password</td>
<td><input type="password" name="pass"></td>
</tr>

<tr>
<td>Gender</td>
<td>

Male:<input type="radio" name="gen" value="Male">
Female:<input type="radio" name="gen" value="Female">

</td>
</tr>

<tr>
<td>Lag</td>
<td>
Gujarati:<input type="checkbox" name="lag[]" value="Gujarati">
Hindi:<input type="checkbox" name="lag[]" value="Hindi">
English:<input type="checkbox" name="lag[]" value="English">
</td>
</tr>

<tr>
<td>Country</td>
<td>
<select name="cid">
<?php
foreach ($country as $c)
{
    ?>
    <option value="<?php echo $c->cid;?>">
                   <?php echo $c->cnm;?>
                   </option>
<?php
}
?>



   
  </select> 
  </td>
  </tr>
  <tr>
  <td><input type="submit" name="submit"></td>
  </tr>
  </table>
  </form>
  </body>
  </html>
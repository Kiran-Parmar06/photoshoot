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
<td><input type="text" name="unm" value="<?php echo $res->unm;?>"></td>
</tr>


<tr>
<td>Password</td>
<td><input type="password" name="pass" value="<?php echo $res->pass;?>"></td>
</tr>

<tr>
<td>Gender</td>
<td>

<?php
$gen=$res->gen;
if($gen='Male')
{
?>
    Male:<input type="radio" name="gen" value="Male" checked="checked">
Female:<input type="radio" name="gen" value="Female">
<?php
}
 else 
 {
     ?>
     Male:<input type="radio" name="gen" value="Male">
Female:<input type="radio" name="gen" value="Female" checked="checked">
          
 <?php
 }
 ?>
 
</td>
</tr>

<tr>
<td>Lag</td>
<td>
Gujarati:<input type="checkbox" name="lag[]" value="Gujarati"
                 <?php
    $lag=$res->lag;
   $arr=explode(",",$lag);
   if(in_array('Gujarati', $arr))
   {
       echo "checked=checked";
   }
   ?>>
Hindi:<input type="checkbox" name="lag[]" value="Hindi"
             <?php
   $arr=explode(",",$lag);
   if(in_array('Hindi', $arr))
   {
       echo "checked=checked";
   }
   ?>>
English:<input type="checkbox" name="lag[]" value="English"
               <?php
   $arr=explode(",",$lag);
   if(in_array('English', $arr))
   {
       echo "checked=checked";
   }
   ?>>
</td>
</tr>

<tr>
<td>Country</td>
<td>
<select name="cid">
<?php
foreach ($country as $c)
{
    if($res->cid==$c->cid)
    {
    ?>
    <option value="<?php echo $c->cid;?>" selected="selected">
                   <?php echo $c->cnm;?>
                   </option>
              <?php
              }
else
{
    ?>
                    <option value="<?php echo $c->cid;?>">
                   <?php echo $c->cnm;?>
                   </option>
<?php
 }
}
?>
  </select> 
  </td>
  </tr>
  <tr>
      <td><input type="submit" name="update" value="update"></td>
  </tr>
  </table>
  </form>
  </body>
  </html>
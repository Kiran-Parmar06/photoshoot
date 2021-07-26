<?php
include('control.php');
if(!(isset($_SESSION['user'])))
{
    header('location:login.php');
} 
?>

<html>
    <body>
        <h1 align="center">welcome:<?php echo $_SESSION['user'];?></h1> 
        <h1 align="center">welcome:<?php echo $_COOKIE['user'];?></h1> 
        <form method="post">       
            

            <table align="center" border="2"><tr><td>Uid</td>
                                                                <td>User Name</td>
                                                                <td>Password</td>
                                                                
                                                                <td>Gender</td>
                                                                 
                                                                 <td>Lag</td>
                                                                  <td>cid</td>
                                                                  <td>cnm</td>
                                                               
                                                                  <td colspan="3">Action</td>
                                                                  
                                                                 </tr>

<?php
foreach($show as $fetch)
{
    
	?>
	<tr>
    <td><?php echo $fetch->uid;?></td>
    <td><?php echo $fetch->unm;?></td>	
    <td><?php echo $fetch->pass;?></td>
    <td><?php echo $fetch->gen;?></td>
    <td><?php echo $fetch->lag;?></td>
    <td><?php echo $fetch->cid;?></td>
    <td><?php echo $fetch->cnm;?></td>
    <td><a href="control.php?duid=<?php echo $fetch->uid;?>">delete</a></td>
   <td><a href="edit.php?euid=<?php echo $fetch->uid;?>">edit</a></td>
   
 <?php
}
 ?>
        
    </tr>
    <tr>
        <td><a href="logout.php">Logout</a></td>
    </tr>
    </table>
    </form>
    </body>
    </html>
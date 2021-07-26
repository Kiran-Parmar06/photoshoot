<?php
session_start();
session_unset('user');
setcookie('user',$unm,time()-15);
setcookie('pass',$pass,time()-15);
header('location:login.php');
?>
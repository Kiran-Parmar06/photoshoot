<?php
include('model.php');
session_start();
$obj=new model;
$country=$obj->select($conn,'country');
$show=$obj->select_join($conn,'reg','country','reg.cid=country.cid');
if(isset($_REQUEST['submit']))
{
    $unm=$_REQUEST['unm'];
   $pass=$_REQUEST['pass'];
   $gen=$_REQUEST['gen'];
   $lagc=$_REQUEST['lag'];
   $lag=implode(",",$lagc);
   $cid=$_REQUEST['cid'];
 
   $data=array("unm"=>$unm,"pass"=>$pass,"gen"=>$gen,"lag"=>$lag,"cid"=>$cid);
   $res=$obj->insert($conn,'reg',$data);
   if($res)
   {
       header('location:show.php');
   }
 else 
       
 {
     echo "not success";
 }
}
if(isset($_REQUEST['duid']))
{
    $duid=$_REQUEST['duid'];
    $where=array("uid"=>$duid);
    $res_del=$obj->delete_where($conn,'reg',$where);
    if($res_del)
    {
        header('location:show.php');
    }
 else    
 {
     echo "delete not success";
 }       
}

if(isset($_REQUEST['login']))
{
    $unm=$_REQUEST['unm'];
    $pass=$_REQUEST['pass'];
    $where=array("unm"=>$unm,"pass"=>$pass);
    $res=$obj->select_where($conn,'reg',$where);
    
     $rm=$_REQUEST['rm'];
        
        if(isset($rm))
        {
            setcookie('user',$unm,time()+15);
            setcookie('pass',$pass,time()+15);
        }
      $_SESSION['user']=$unm;
   
       
    $chk=$res->num_rows;
    if($chk==1)
    {
        header('location:show.php');
    }
 else {
    echo "login failed";    
    }
}

if(isset($_REQUEST['euid']))
{
    $euid=$_REQUEST['euid'];
    $where=array("uid"=>$euid);
    $res_edit=$obj->select_where($conn,'reg',$where);
    $res=$res_edit->fetch_object();
    
    if(isset($_REQUEST['update']))
    {
   $unm=$_REQUEST['unm'];
   $pass=$_REQUEST['pass'];
   $gen=$_REQUEST['gen'];
   $lagc=$_REQUEST['lag'];
   $lag=implode(",",$lagc);
   $cid=$_REQUEST['cid'];
 
   $data=array("unm"=>$unm,"pass"=>$pass,"gen"=>$gen,"lag"=>$lag,"cid"=>$cid);
   $res_upd=$obj->update($conn,'reg',$data,$where);
   if($res_upd)
   {
       header('location:show.php');
   }
 else  
 {
     echo "not success";
 }
   
    }
}
?>
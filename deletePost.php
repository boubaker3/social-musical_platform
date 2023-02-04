<?php
include_once'userData.php';
include_once'connect.php';
session_start();
 $DB=new Database();
$user=new User();
$id=$_GET['id'];
 
 if($_GET['type']=="post"){
    $user->deletePost($_SESSION['userid'],$_GET['id']);

    if(isset($_SERVER['HTTP_REFERER']) )
    {

       header('Location: '.$_SERVER['HTTP_REFERER']);
   }     
 }

 
 
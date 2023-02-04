<?php
include'postData.php';
include_once'connect.php';
include'notificationsHandler.php';
 
session_start();
if(isset($_SERVER['HTTP_REFERER'])){
    $return_to=$_SERVER['HTTP_REFERER'];
}else{
    $return_to='profile.php';
}
if(isset($_GET['type'])&& isset($_GET['id'])&& isset($_GET['owner'])){
 if(is_numeric($_GET['id'])){
     $allowed[]='id';
     $allowed[]='post';
     $allowed[]='profile';
  if(in_array($_GET['type'],$allowed)){   
   $post=new Post();
   $notifications=new Notification();
$notifications->addNotifications($_GET['id'],$_GET['owner'],$_GET['type'],$_SESSION['userid']);
$post->getLike($_GET['id'],$_GET['type'],$_SESSION['userid']);
$post->getPostLikes($_GET['id'],$_SESSION['userid']);
$favorite=new Favorites();
$favorite->addFavorites($_SESSION['userid'],$_GET['id']);

 }

 }  
}
 
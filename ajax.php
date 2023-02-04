<?php
include'postData.php';
include_once'connect.php';
include'notificationsHandler.php';
include'favoritesHandler.php';

 $data=file_get_contents("php://input");
if($data!=""){
    $data=json_decode($data);
 }
if(isset($data->action) && $data->action == "like"){
  include"like.ajax.php";
  
}
if(isset($data->action) && $data->action=="follow"){
  include"follow.ajax.php";
 
}
 
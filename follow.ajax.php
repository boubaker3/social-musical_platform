<?php
 session_start();
  $query_string=explode("?",$data->link);
 $query_string=end($query_string);
 $str=explode("&",$query_string);
 foreach($str as $value){
    $value=explode("=",$value);
     $_GET[$value[0]]=$value[1];
 }
        
 if(isset($_GET['type']) && isset($_GET['id'])){
        $post=new Post();

 if(is_numeric($_GET['id'])){
     $allowed[]='id';
     $allowed[]='profile';
  if(in_array($_GET['type'],$allowed)){   
$notifications=new Notification();
$notifications->addNotifications("noPost",$_GET['id'],$_GET['type'],$_SESSION['userid']);
 
$post->getLike($_GET['id'],$_GET['type'],$_SESSION['userid']);
}

 }
 
 $isfollowed=$post->isFollowed($_SESSION['userid'],$_GET['type']);
 $ids=false;
   if(is_array($isfollowed)){
     $ids=array_column($isfollowed,"userid");
   }
 echo in_array($_GET['id'],$ids) ? "<img src='assets/followed.png' width=\"150px\" height=\"40px\">" : "<img src='assets/follow.png' width=\"150px\" height=\"40px\">";


}
 
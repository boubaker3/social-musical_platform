<?php
 session_start();
 $query_string=explode("?",$data->link);
 $query_string=end($query_string);
 $str=explode("&",$query_string);
 foreach($str as $value){
    $value=explode("=",$value);
     $_GET[$value[0]]=$value[1];
 }
 
 if(isset($_GET['type']) && isset($_GET['id'])&& isset($_GET['owner'])){
        $post=new Post();

 if(is_numeric($_GET['id'])){
     $allowed[]='id';
     $allowed[]='post';
  if(in_array($_GET['type'],$allowed)){ 
    $notifications=new Notification();
$notifications->addNotifications($_GET['id'],$_GET['owner'],$_GET['type'],$_SESSION['userid']);  
$post->getLike($_GET['id'],$_GET['type'],$_SESSION['userid']);
$post->getPostLikes($_GET['id'],$_SESSION['userid']);
$favorite=new Favorites();
$favorite->addFavorites($_SESSION['userid'],$_GET['id']);

 }

 }
 
 $res=$post->isLiked($_SESSION['userid'],$_GET['type']);
 $ids=false;
 if(is_array($res)){
     $ids=array_column($res,"userid");
  }
 
if(in_array($_GET['id'],$ids)){
            echo "<img src='assets/liked.png' width=\"30px\" height=\"28px\">";

}
else{
           echo "<img src='assets/unliked.png' width=\"30px\" height=\"28px\">";
             
}
 


}
 
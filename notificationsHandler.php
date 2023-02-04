<?php
 class Notification{
function addNotifications($postId,$id,$type,$myuserid){
   if($type=="profile"){
    $DB=new Database();
   
    $sql="SELECT * from notifications where type='profile' && notifications='$myuserid' limit 1";
    $res= $DB->retrieve($sql);
     
       if(!$res){
        $sql="insert into notifications (idReceiver,notifications,type) values('$id','$myuserid','$type')";
        $DB->save($sql);
       }
    

   }
   else if($type=="post") {
    $DB=new Database();
  
    $sql="SELECT * from notifications where type='post' && notifications='$postId' limit 1";
    $res= $DB->retrieve($sql);
   
      if(!$res){
        $sql="insert into notifications (idReceiver,notifications,type,notificationPost) values('$id','$myuserid','$type','$postId')";
        $DB->save($sql);
      }
    
   }
       
    }
    

}
 
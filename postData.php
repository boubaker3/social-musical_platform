<?php
 class Post{
    function isFollowed($userid,$type){

        $DB=new Database();
        $sql="select following from likes where contentid='$userid' && type='$type' ";
        $res=$DB->retrieve($sql);
        if($res){
            $row=json_decode($res[0]['following'],true);
            return $row;
        }else{
            return false;
        }
     }
   
   
 function isLiked($userid,$type){
    $DB=new Database();
    $sql="select likes from likes where contentid='$userid' && type='$type'";
    $res=$DB->retrieve($sql);
    if($res){
        $row=json_decode($res[0]['likes'],true);
        return $row;
    }else{
        return false;
    }
 }  
  function isThere($id ){
    $query="SELECT * FROM posts where postId in('" .$id. "') ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    return $res;
    }
    else{
        return false;
    }
    }
 function getPostLikes($id,$myuserid){
    $DB=new Database();
    $sql="SELECT likes FROM postlikes WHERE  likedPost='$id' LIMIT 1";
    $res=$DB->retrieve($sql);
    if(is_array($res)){
        $likes=json_decode($res[0]['likes'],true);
        $ids=array_column($likes,"userid");
        if(!in_array($myuserid,$ids)){
            $arr['userid']=$myuserid;
            $likes[]=$arr;
            $likesString=json_encode($likes);
            $sql="update postLikes set likes='$likesString' where likedPost='$id' limit 1 ";
            $DB->save($sql);
        }else{
             $key=array_search($myuserid,$ids);
        if($likes[$key]==end($likes)){
            unset($likes[$key]);
        }else{
            $last=end($likes);
          
            list($last,$likes[$key]) = array($likes[$key],$last);
            unset($likes[count($likes) - 1]);
        }
            $likesString=json_encode($likes);
            $sql="update postLikes set likes='$likesString' where likedPost='$id' limit 1 ";
            $DB->save($sql);
        }
        
    }else{
        $arr['userid']=$myuserid;
        $likes[]=$arr;
        $likesString=json_encode($likes);
        $sql="insert into postlikes (likedPost,likes) values('$id','$likesString')";
        $DB->save($sql);
    }
 }
 function getLike($id,$type,$myuserid){
    if($type=="post"){
$DB=new Database();

$sql="SELECT likes FROM likes WHERE type='post' && contentid='$myuserid' LIMIT 1";
$res=$DB->retrieve($sql);

if(is_array($res) ){
    $likes=json_decode($res[0]['likes'],true);
    $ids=array_column($likes,"userid");
    if(!in_array($id,$ids)){
        $arr["userid"]=$id;
        $arr["date"]=date("m:d");
         $likes[]=$arr;
        $likesString=json_encode($likes);
         $sql="UPDATE likes SET likes='$likesString' WHERE type='post' && contentid='$myuserid' LIMIT 1";
        $res=$DB->save($sql);
        $sql="UPDATE posts SET likes= likes + 1 WHERE postId='$id' LIMIT 1";
    $DB->save($sql);
  
}
    else{
        $key=array_search($id,$ids);
        if($likes[$key]==end($likes)){
            unset($likes[$key]);
        }else{
            $last=end($likes);
          
            list($last,$likes[$key]) = array($likes[$key],$last);
            unset($likes[count($likes) - 1]);
        }
        
        $likesString=json_encode($likes);
        $sql="UPDATE likes SET likes='$likesString' WHERE type='post' && contentid='$myuserid' LIMIT 1";
        $res=$DB->save($sql);
        $sql="UPDATE posts SET likes= likes - 1 WHERE postId='$id' LIMIT 1";
        $DB->save($sql);
        
        
     }
   
}
else{
    $arr["userid"]=$id;
    $arr["date"]=date("m:d");
     $arr2[]=$arr;
    $likes=json_encode($arr2);
     $sql="INSERT INTO likes (type,contentid,likes) VALUES('$type','$myuserid','$likes') ";
    $DB->save($sql);
    $sql="UPDATE posts SET likes=likes+1 WHERE postId='$id' LIMIT 1";
$DB->save($sql); 
} 
}
else if($type=="profile"){
        
        $DB=new Database();

         $sql="SELECT following  from likes where type='profile' && contentid='$myuserid' limit 1";
       $res= $DB->retrieve($sql);
      
       if(is_array($res)){
        $following=json_decode($res[0]['following'],true);
        $ids=array_column($following,"userid");
        if(!in_array($id,$ids) ){
            
            $arr["userid"]=$id;
            $arr['date']=date("m:d");
            $following[]=$arr;
            $followingString=json_encode($following);
           
            $sql="update likes set following='$followingString' where type='profile' && contentid='$myuserid' limit 1";
            $DB->save($sql);
           
            $sql="update users set following =following+1 where userid='$myuserid' limit 1";
            $DB->save($sql);

        
         
             
        }else{
         
  
            $key=array_search($id,$ids);
            if($following[$key]==end($following)){
                unset($following[$key]);
            }
            else{
                $last=end($following);
              
                list($last,$following[$key]) = array($following[$key],$last);
                unset($following[count($following) - 1]);

              
            }
           

            $followingString=json_encode($following);
            $sql="update likes set following='$followingString' where type='profile' && contentid='$myuserid' limit 1";
            $DB->save($sql);
        
        }
          
        


       }else{
           $arr["userid"]=$id;
           $arr["date"]=date("m:d");
           $arr2[]=$arr;
           $following=json_encode($arr2);
            $sql="insert into likes (type,contentid,following,likes) values('$type','$myuserid','$following','[]') ";
            $DB->save($sql);          
            $sql="update users set following =following+1 where userid='$myuserid' limit 1";
            $DB->save($sql);


           
}
$sql="SELECT likes from likes where type='profile' && contentid='$id' limit 1";
$res2= $DB->retrieve($sql);
if( is_array($res2) ){
    $followers=json_decode($res2[0]['likes'],true);
    $idsfollowers=array_column($followers,"userid");
    if(  !in_array($myuserid,$idsfollowers)){
        $arr2["userid"]=$myuserid;
        $arr2['date']=date("m:d");
        $followers[]=$arr2;
        $followersString=json_encode($followers);
        $sql="update likes set likes='$followersString' where type='profile' && contentid='$id' limit 1";
        $DB->save($sql);
        $sql="update users set followers =followers+1 where userid='$id' limit 1";
        $DB->save($sql);
    }else{
        $key2=array_search($myuserid,$idsfollowers);
        if($followers[$key2]==end($followers)){
            unset($followers[$key2]);

        }     
        else{
            $last2=end($followers);
          
            list($last2,$followers[$key2]) = array($followers[$key2],$last2);
            unset($followers[count($followers) - 1]);
        }
          
            $followersString=json_encode($followers);
            $sql="update likes set likes='$followersString' where type='profile' && contentid='$id' limit 1";
            $DB->save($sql);
    }

}else{
    $arrfollowers["userid"]=$myuserid;
    $arrfollowers["date"]=date("m:d");
    $followers[]=$arrfollowers;
    $followersString=json_encode($followers);
     $sql="insert into likes (type,contentid,likes,following ) 
     values('$type','$id','$followersString','[]') ";
     $DB->save($sql); 

    $sql="update users set followers =followers+1 where userid='$id' limit 1";
    $DB->save($sql);


}
    }
  
    

   

}

 

}
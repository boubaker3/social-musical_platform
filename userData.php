<?php
include('connect.php');
class User{
function getUserData($id){
$query="SELECT * FROM users where userid='$id' LIMIT 1";
$DB=new Database();
$res=$DB->retrieve($query);
if($res){
$row=$res[0];
return $row;
}
else{
    return false;
}
}
function getCategoriesLimited($category,$id){
  $query="SELECT * FROM posts where category ='$category' && userid!='$id' order by id desc limit 6";
  $DB=new Database();
  $res=$DB->retrieve($query);
  if($res){
   return $res;
  }
  else{
      return false;
  }
  }
  function getCategories($category,$id){
    $query="SELECT * FROM posts where category ='$category'&& userid!='$id' order by id desc ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
     return $res;
    }
    else{
        return false;
    }
    }
function getFriends($id){
  $query="SELECT * FROM users where userid !='$id' order by id desc limit 10";
  $DB=new Database();
  $res=$DB->retrieve($query);
  if($res){
  $row=$res;
  return $row;
  }
  else{
      return false;
  }
  }
  function getAllFriends($id,$ids){
    $query="SELECT * FROM users where userid !='$id' && userid  NOT IN('" .$ids. "') order by id desc ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    $row=$res;
    return $row;
    }
    else{
        return false;
    }
    }
    function getOnlymyFriends($id,$ids){
      $query="SELECT * FROM users where userid !='$id' && userid   IN('" .$ids. "') order by id desc ";
      $DB=new Database();
      $res=$DB->retrieve($query);
      if($res){
      $row=$res;
      return $row;
      }
      else{
          return false;
      }
      }
    function isMine($id,$postId){
      $query="SELECT postId FROM posts where userid ='$id' && postId='$postId' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
      if($res){
      return $res;
      }
      else{
          return false;
      }
      }  
       function deletePost($id,$postId){
        $query="delete from posts where userid ='$id' && postId='$postId' ";
        $DB=new Database();
        $res=$DB->save($query);
        if($res){
        return $res;
        }
        else{
            return false;
        }
        }
        
    function getFollowingPosts($id){
      $query="SELECT following FROM likes where type='profile' && contentid='$id'  ";
$DB=new Database();
$res=$DB->retrieve($query);
if( is_array($res) ){
  $row=json_decode($res[0]['following'],true);
    return $row;
}else{
  return false;
}
    }
    function getNotifications($id){
      $query="SELECT * FROM notifications where  idReceiver='$id' ORDER BY id DESC   ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if( is_array($res) ){
     return $res;
    }else{
    return false;
    }
  }
  function getNotificationsLike($id){
    $query="SELECT postsIds FROM likesnotifications where type='post' && idReceiver='$id'   ORDER BY id DESC   ";
  $DB=new Database();
  $res=$DB->retrieve($query);
  if( is_array($res) ){
  $row=json_decode($res[0]['postsIds'],true);
  return $row;
  }else{
  return false;
  }
}   
function getNotificationsLikeUsers($id){
  $query="SELECT userid FROM likesnotifications where type='post' && idReceiver='$id'    
  ORDER BY id DESC   ";
$DB=new Database();
$res=$DB->retrieve($query);
if( is_array($res) ){
$row=json_decode($res[0]['userid'],true);
return $row;
}else{
return false;
}
} 
  
    
      function getLikes($id){
        $query="select likes from likes where type='post' && contentid='$id' ";
        $DB=new Database();
        $res=$DB->retrieve($query);
        if(is_array($res)){
          $row=json_decode($res[0]['likes'],true);
          return $row;
        }
        else{
          return false;
        }
      }
      function getMyFriends($id){
        $query="select following from likes where type='profile' && contentid='$id' ";
        $DB=new Database();
        $res=$DB->retrieve($query);
        if(is_array($res)){
          $row=json_decode($res[0]['following'],true);
          return $row;
        }
        else{
          return false;
        }
      }
      function updateSeen($id){
        $query="UPDATE chat SET seen='1' WHERE sender= '$id'  ";
        $DB=new Database();
        $DB->save($query);
       
      }
      function updateReceived($id){
        $query="UPDATE chat SET received='1' WHERE received= '$id'  ";
        $DB=new Database();
        $DB->save($query);
       
      }
      function seenNotif($id){
        $query="UPDATE notifications SET seen='1' WHERE idReceiver= '$id'  ";
        $DB=new Database();
        $DB->save($query);
       
      }
function getPostData($postUserid){
  $query="SELECT * FROM posts where userid='$postUserid' ORDER BY id DESC ";
  $DB=new Database();
  $res=$DB->retrieve($query);
  if($res){
  return $res;
  }
  else{
      return false;
  }
  }
  function getPopulars($id){
    $query="SELECT * FROM posts where userid!='$id' ORDER BY likes DESC";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    return $res;
    }
    else{
        return false;
    }
    }
    function find($find){
      $query="SELECT * FROM users where username like '%$find%' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
      if($res){
      return $res;
      }
      else{
          return false;
      }
      }
      function findPost($find){
        $query="SELECT * FROM posts where title like '%$find%' ";
        $DB=new Database();
        $res=$DB->retrieve($query);
        if($res){
        return $res;
        }
        else{
            return false;
        }
        }
  function getNotificationsData($id ){
    $query="SELECT * FROM posts where postId ='$id' ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    return $res[0];
    }
    else{
        return false;
    }
    }
    function getNotificationsMaker($id ){
      $query="SELECT * FROM users where userid ='$id' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
      if($res){
      return $res[0];
      }
      else{
          return false;
      }
      }
    function getNotificationsUser($id ){
      $query="SELECT * FROM users where userid in('" .$id. "')";
      $DB=new Database();
      $res=$DB->retrieve($query);
      if($res){
       return $res;
      }
      else{
          return false;
      }
      }
      
    function getNotificationsPost($id ){
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
      function getFavoritesPost($id ){
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
      function getFavorites($id){
        $query="select favorites from favorites where userid='$id'";
        $DB=new Database();
        $res=$DB->retrieve($query);
      if(is_array($res)){
        $row=json_decode($res[0]['favorites'],true);
        return $row;
      }else{
        return false;
      }
      }
  function getPostDataHome($id){
    $query="SELECT * FROM posts where userid in('" .$id. "') ORDER BY id DESC";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    return $res;
    }
    else{
        return false;
    }
    }
    function getWhoLiked($id){
      $query="select * from users where userid in('" .$id. "')";
      $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
       return $res;
    }else{
      return false;
    }
    }
    function getpostLikes($id){
      $query="select likes from postlikes where likedPost ='$id' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
      $row=json_decode($res[0]['likes'],true);
       return $row;
    }else{
      return false;
    }
    }
    function getFollowers($id){
      $query="select likes from likes where contentid ='$id' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
      $row=json_decode($res[0]['likes'],true);
       return $row;
    }else{
      return false;
    }
    }  
      function getFollowing($id){
      $query="select following from likes where contentid ='$id' ";
      $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
      $row=json_decode($res[0]['following'],true);
       return $row;
    }else{
      return false;
    }
    }
    
    function getFollowersUsers($id){
      $query="SELECT t1.* from chat 
      t1 JOIN (SELECT id,msgid,max(date) mydate from chat where sender ='$id' || receiver='$id' group by msgid ) t2 on  t2.mydate=t1.date group by msgid order by id desc ";
       $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
         return $res;
    }else{
      return false;
    }
    }
    function getUsers($id){
      $query="select * from users where userid ='$id'   ";
      $DB=new Database();
      $res=$DB->retrieve($query);
    if( $res ){
      $row=$res[0];
      return $row;
        }
        else{
      return false;
    }
    }
  function getPostid($postid){
    $query="SELECT * FROM posts where postId='$postid' LIMIT 1 ";
    $DB=new Database();
    $res=$DB->retrieve($query);
    if($res){
    return $res[0];
    }
    else{
        return false;
    }
    }

function checkUser($id){
  if(is_numeric($id)){
    $query="SELECT * FROM users WHERE userid='$id' LIMIT 1";
  
    $DB =new Database();
    $res=$DB->retrieve($query);
    if($res){
      $userdata=$res[0];
      return $userdata;
    }
    else{
      header('Location: login.php');
    }
  }
  else{
    header('Location: login.php');
    die;
  }
 
}

function checkId($id){
  if(!is_numeric($id)){
   
   if(headers_sent())
   echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
  

  }else{
    header('Location: officialPage.php?section=notFound');
  }
}
function showMsg($myuserid,$id){
  $DB=new Database();
  $sql="select * from chat where sender ='$myuserid'
   && receiver='$id' || sender='$id' && receiver='$myuserid' order by id desc";
  $res=$DB->retrieve($sql);
  if($res){
    return $res;
  }
  else{
    return false;
  }
}
function showOnlyOneMsg($myuserid,$id){
  $DB=new Database();
  $sql="select * from chat where sender ='$myuserid'
   && receiver='$id' || sender='$id' && receiver='$myuserid' order by id desc  ";
  $res=$DB->retrieve($sql);
  if($res){
    return $res[0];
  }
  else{
    return false;
  }
}
function chatNotif($myuserid){
  $DB=new Database();
  $sql="select * from chat where receiver='$myuserid' && seen='0'   ";
  $res=$DB->retrieve($sql);
  if($res){
    return $res;
  }
  else{
    return false;
  }
}
function countNotif($myuserid){
  $DB=new Database();
  $sql="select * from notifications where idReceiver='$myuserid' && seen='0'   ";
  $res=$DB->retrieve($sql);
  if($res){
    return $res;
  }
  else{
    return false;
  }}
}

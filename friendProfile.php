<?php
ob_start();
include_once'userData.php';
$user=new User();
$user->checkUser($_SESSION['userid']);
$user->checkId($_GET["id"]);

 if(is_numeric($_GET['id'])){
    $user_data=$user->getUserData($_GET['id']);
    if($user_data){
        $id=$_SESSION['userid'];
    
        $post_Data=$user->getPostData($_GET['id']);
        
        $followers=$user->getFollowers($_GET['id']);
        $followersIds=false;
        if(is_array($followers)){
            $followersIds=array_column($followers,"userid");
            $followersIds=implode("','",$followersIds);
        }
        $followersFinal=$user->getWhoLiked($followersIds);
        
        
        $following=$user->getFollowing($_GET['id']);
        $followingIds=false;
        if(is_array($following)){
            $followingIds=array_column($following,"userid");
            $followingIds=implode("','",$followingIds);
        }
        $followingFinal=$user->getWhoLiked($followingIds);
    
    }else{
        if(headers_sent()) {
        echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
       
     
       }else{
         header('Location: officialPage.php?section=notFound');
       }
    }
   
} 
ob_end_flush();
?>
<!Doctype html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>

 
<body id="body">
<div  id="followers">
<div   style="width: 150px; padding: 10px; position: fixed;background-color: rgb(33, 0, 48);">

<button id="followersBtn" onclick="cancelFollowers()">cancel</button>
<h2 style="font-family: 'Fredoka One',cursive;color: white;
 display: inline-block;font-size: 20px;
">followers</h2>
</div>
<br><br>

<?php
if($followersFinal){
    foreach($followersFinal as $followersRow){
        include('followerDesign.php');
    }
}

?>

</div>
<div  id="following">
    
<div   style="width: 150px; padding: 10px; position: fixed;background-color: rgb(33, 0, 48);">

<button id="followingBtn" onclick="cancelFollowing()">cancel</button>
<h2 style="font-family: 'Fredoka One',cursive;color: white;font-size: 20px;">following</h2>
</div>
<br><br>
<?php
if($followingFinal){
    foreach($followingFinal as $followingRow){
        include('followingDesign.php');
    }
}

?>

</div>

<form method="post">

<div id="parent">


 




     <div  style="display: inline-block;">
 <?php
 if($user_data['photo_profile']=="null"){
     $image="assets/account.png";
 }
 else{
     $image=$user_data['photo_profile'];
 }
 ?>
 <img style="  border-radius: 10px;border-radius: 10px; object-fit: cover;
" height="150px" width="150px" 
src="<?php echo $image ?>">
     </div>
     <div  style="margin-left: 10px;margin-top: 50px; position: absolute;display: inline-block; text-align: center;   font-family: 'Fredoka One', cursive;color : white;font-size: 30px;">
     <a><?php echo $user_data['username'] ?></a>

     </div>
      
     <?php
     if($user_data['postsNumber']==0 ||$user_data['postsNumber']==1)
     {
         $user_data['postsNumber'].=" "."post";
     }
     else{
        $user_data['postsNumber'].=" "."posts";

     }
     if($user_data['followers']==0 ||$user_data['followers']==1)
     {
         $user_data['followers'].=" "."follower";
     }
     else{
        $user_data['followers'].=" "."followers";

     }
     
     
     ?>
    
     <div class="row "  style="width: 600px; margin-top: 10px;">
     <div class="col-8 col-md-3 mt-1 mt-md-0 " style="  margin-left: 5px; border: rgb(170, 0, 142) 2px solid; border-radius: 10px;">
     <a style="   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-size: 15px;">
     <?php echo $user_data['postsNumber'] ?></a>
     </div>
     <div class="col-8 col-md-3  mt-1 mt-md-0" style="  margin-left: 5px;border: rgb(170, 0, 142) 2px solid; border-radius: 10px;">
     <a onclick="showFollowers()" style=" padding: 5px;  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-size: 15px;">
     <?php echo $user_data['followers']   ?></a>
     </div>

    <div class="col-8 col-md-3  mt-1 mt-md-0" style=" margin-left: 5px; border: rgb(170, 0, 142) 2px solid; border-radius: 10px;">
     <a onclick="showFollowing()" style=" padding: 5px;  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white; font-size: 15px;">
     <?php echo $user_data['following'] ." ". "Following" ?></a>
     </div></div>
     <?php
 
 include_once'userData.php';
 $id=$_SESSION['userid'];
 $user=new User();
 $res=$user->getFollowingPosts($id);
 $follow="assets/follow.png";
 if(is_array($res)){
    $ids=array_column($res,"userid");
    if(in_array($user_data['userid'],$ids)){
       $follow="assets/followed.png";
     }
   else{
    $follow="assets/follow.png";
 
   }
 }
 
 
    

?>
<div  > 
<span style=" display:  block;margin-left: 20px;">

<a onclick="followajax(event)" href="like.php?type=profile&id=<?php echo $user_data['userid'] ?>">
     <img style=" border-radius: 10px; "  src="<?php echo $follow ?>"  width="150px" height="40px"  >
     </img></a>
  
     </span>
 

</div> 
     
<div  style="background-color: var(--main-color2); height: 1px;  margin-left: 10%;
margin-right: 10%;box-shadow: 0 0 1em var(--main-color2);margin-top: 10px; ">
<a></a> 
</div> 

<div style="margin-top: 20px;">
<?php
if($post_Data){
    foreach($post_Data  as $ROW){
     
    $user=new User();
    $ROW_USER=$user->getUserData($ROW['userid']);
         include ("postDesign.php");
     
    }
    $noPostsYet="none";
}else{
$noPostsYet="block";
}
 
?>
<h3 style= "opacity: 0.5; margin-left: 10%; width: 800px; font-family: 'Fredoka One'cursive;font-size: 20px;color: white;display: <?php echo $noPostsYet ?>;" >This profile has no posts yet</h3>
</div>
</div>

</form>
 <style>
      :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
#back:hover{
     opacity: 0.2;
    transition-duration: 1s;
    
}
#parent{
    margin-top: 75px;
 width: 100%;
 }
#chatContainer{
    width: 360px;
    height: 400px;
    background-color:rgb(33, 0, 48);
      right: 0;
    border-radius: 10px;
    margin-right: 50px;
    display: none;
     padding: 5px;
     position: fixed;
     margin-top: 100px;
     overflow-x: hidden;
 }
::placeholder {  
    color: white;
    opacity: 0.2;  
  }
 
#chatBtn{
    width: 150px;
    height: 32px;
    background-color: rgba(170, 0, 142, 0.219);
    border-radius: 5px;
    color: white;
    border: 0;
    font-size: 18px;
     font-family: 'Fredoka One',cursive;
     margin-left: 20px;
      
    
   }
#followersBtn{
    display: inline-block;
    border-radius: 20px;
   color: white;
   font-family: 'Fredoka One',cursive;
    width: 100px;
    height: 30px;
    position: absolute;

    margin-left: 200px;
   border: var(--main-color2) 2px solid;
background-color: transparent;
}#followingBtn{
    display: inline-block;
    border-radius: 20px;
   color: white;
   font-family: 'Fredoka One',cursive;
    width: 100px;
    height: 30px;
    
    position: absolute;
   margin-left: 200px;
   border: var(--main-color2) 2px solid;
background-color: transparent;
}
#followers{
position: absolute;
box-shadow:  0 0 0.5em var(--main-color);

background-color:  rgb(33, 0, 48);
 width: 350px;
height: 400px;
margin-left: 400px;
 border-radius: 20px;
 padding: 10px;
 display: none;
 overflow-y: auto;
 overflow-x: hidden;
 margin-top: 100px;

}
#following{
    padding: 10px;
    overflow-y: auto;
    overflow-x: hidden;
position: absolute;
background-color:  rgb(33, 0, 48);
width: 350px;
margin-left: 400px;
box-shadow:  0 0 0.5em var(--main-color);
 height: 400px;
display: none;
margin-top: 100px;
border-radius: 20px;
}
body{
background-color: var(--main-color);
  overflow-x: hidden;
}
 
::-webkit-scrollbar {
    width: 8px;

   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
    border-radius: 8px;

  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
  background-clip: padding-box;  
  border-radius: 8px;
}
  :root{
    scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
    scrollbar-width: thin !important;
     
  }
button:hover{
    opacity: 0.5;
    transition-duration: 0.5s;
}
 </style>





  <script type="text/javascript">
      var body=document.getElementById('body');

function ajaxEvent(data,element){
    var ajax=new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
        if(ajax.readyState==4 && ajax.status==200){
            response(ajax.responseText,element);
        }
    });
  
    data=JSON.stringify(data);
    ajax.open("post","ajax.php",true);
    ajax.send(data);
}
function followajax(e){
    e.preventDefault();
    var link=e.currentTarget.href;
    var data={};
    data.link=link;
    data.action="follow";
    data.isFollowed="isFollowed";
    ajaxEvent(data,e.currentTarget);
}
function response(result,element){
    element.innerHTML=result;
 }
var followersDiv=document.getElementById('followers');
var followingDiv=document.getElementById('following');
function cancelFollowers(){
followersDiv.style.display='none';
body.style.overflowY='auto';
}
function cancelFollowing(){
    followingDiv.style.display='none';
    body.style.overflowY='auto';
}    

function showFollowers(){
    followersDiv.style.display='block';
    followingDiv.style.display='none';
    body.style.overflow='hidden';

}
function showFollowing(){
    followingDiv.style.display='block';
    followersDiv.style.display='none';
    body.style.overflow='hidden';

}
 var chatContainer=document.getElementById('chatContainer');

function backClick(){
    chatContainer.style.display='none';

}
function chatClick(){
    chatContainer.style.display='block';

}
</script>
 </body>

</html> 

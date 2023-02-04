<?php
include_once'userData.php';
$id=null;
if(isset($_SESSION['userid'])&&is_numeric($_SESSION["userid"])){
    $id=$_SESSION['userid'];
}

$user=new User();
$user_data=$user->getUserData($id); 
$post_Data=$user->getPostData($id);

$followers=$user->getFollowers($id);
$followersIds=false;
if(is_array($followers)){
    $followersIds=array_column($followers,"userid");
    $followersIds=implode("','",$followersIds);
}
$followersFinal=$user->getWhoLiked($followersIds);

$following=$user->getFollowing($id);
$followingIds=false;
if(is_array($following)){
    $followingIds=array_column($following,"userid");
    $followingIds=implode("','",$followingIds);
}
$followingsFinal=$user->getWhoLiked($followingIds);


 
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
<h2 style="font-size: 20px;font-family: 'Fredoka One',cursive;color: white;">following</h2>
    </div>
<br><br>

<?php
if($followingsFinal){
    foreach($followingsFinal as $followingRow){
        include('followingDesign.php');
    }
}

?>

</div >
 
<form method="post">
<div style="margin-top: 75px;" >

     <div  style="display: inline-block;">
 <?php
 if($user_data['photo_profile']=="null"){
     $image="assets/account.png";
 }
 else{
     $image=$user_data['photo_profile'];
 }
 ?>
 <form method="post">
<img style="  border-radius: 10px;border-radius: 10px;  object-fit: cover;" height="150px" width="150px" 
src="<?php echo $image ?>">
     </div>
     <div  style="display: inline-block;position: absolute;  margin-left: 10px;margin-top: 50px; font-family: 'Fredoka One', cursive;color : white;font-size: 30px;">
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
  
     <span style="margin: 10px ;width: 1000px; display: inline-block;">
     <span style="border: rgb(170, 0, 142) 2px solid;width: 200px;border-radius: 10px;">
     <a style=" padding-right: 15px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white;margin-left: 20px;font-size: 15px;">
     <?php echo $user_data['postsNumber'] ?></a>
     </span>
     
     <span style="margin-left: 10px; border: rgb(170, 0, 142) 2px solid;width: 200px;border-radius: 10px;">
     <a  onclick="showFollowers()" style="  padding-right: 15px; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white;margin-left: 20px;font-size: 15px;">
     <?php echo $user_data['followers']   ?></a>
     </span>

    <span style="margin-left: 10px; border: rgb(170, 0, 142) 2px solid;width: 200px;border-radius: 10px;">
     <a  onclick="showFollowing()" style="  padding-right: 15px; margin-left: 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white;margin-left: 20px;font-size: 15px;">
     <?php echo $user_data['following'] ." ". "Following" ?></a>
     </span>
    
    </span>
    <a href="OfficialPage.php?section=edit_my_profile"><button type="button" name="editProfile" style=" background-color: rgb(170, 0, 142);
     border-radius: 10px;border: 0;color: white;width: 100px;height: 20px;
     font-family: 'Fredoka One',cursive ;font-size: 12px;">
     Edit profile</button> </a>
     <div  style="background-color: var(--main-color2); height: 1px;  margin-left: 10%;
margin-right: 10%;box-shadow: 0 0 1em var(--main-color2);margin-top: 10px;">
<a></a> 
</div> 
<div  class="row "  style=" margin-top: 10px;">
<?php
if($post_Data){
    foreach($post_Data  as $ROW){
     
    $user=new User();
    $ROW_USER=$user->getUserData($ROW['userid']);
         include ("postDesign.php");
     
    }
}
 
?>

</div>
 </div>

</form>
 
 
 <style>
      :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
} 
#followersBtn{
    display: inline-block;
   border: var(--main-color2) 2px solid;
   border-radius: 20px;
   color: white;
   font-family: 'Fredoka One',cursive;
    width: 100px;
    height: 30px;
    position: absolute;

    margin-left: 220px;

}
#followingBtn{
    display: inline-block;
   border: var(--main-color2) 2px solid;
   border-radius: 20px;
   color: white;
   font-family: 'Fredoka One',cursive;
    width: 100px;
    height: 30px;
     position: absolute; 
     margin-left: 200px;

}
#followers{
position: absolute;
background-color:rgb(33, 0, 48);
 width: 350px;
height: 400px;
padding-left: 10px;
    padding-right: 10px;
margin-left: 400px;
 border-radius: 8px;
  display: none;
 margin-top: 100px;
 overflow-y: auto;
 overflow-x: hidden;
 box-shadow:  0 0 0.5em var(--main-color);
}
#following{
    padding-left: 10px;
    padding-right: 10px;

    margin-top: 100px;
position: absolute;
background-color:rgb(33, 0, 48);
width: 350px;
margin-left: 400px;
  height: 400px;
display: none;
border-radius: 8px;
overflow-y: auto;
overflow-x: hidden;
box-shadow:  0 0 0.5em var(--main-color);

}
body{
background-color: var(--main-color);
 overflow-x: hidden;
 padding-right: 10%;
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

 </style>
  <script>
      var followersDiv=document.getElementById('followers');
var followingDiv=document.getElementById('following');
var body=document.getElementById('body');
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
 
  </script>
 </body>

</html> 
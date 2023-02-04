<?php   
  include_once('userData.php');
 $user=new User();
$id=$_SESSION['userid'];
$res=$user->getFollowingPosts($id);
$ids=false;
if(is_array($res)){
    $ids=array_column($res,"userid");
    $ids=implode("','",$ids);
}
$friends=$user->getOnlymyFriends($id,$ids);



?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>
<body>
  <div   style=" margin-top: 100px;">

<div id="tab">
 <div onclick="loginTabClick();" id="loginTab">
<a href="officialPage.php?section=add_new_friends"><button>add Friends</button></a>
 </div>
<div onclick="signupTabClick();" id="signupTab">
  <a  href="officialPage.php?section=my_friends"><button>my Friends</button></a>
</div>
</div>
<div style="width: 800px;"  class=" ms-3 ms-md-0" >
    <h2>
        My Friends
    </h2>
  <?php
  $isDisplayed="none";
 if($friends){
    foreach($friends as $FRIENDS_ROW){
 
        
include('friendsDesignFull.php');

    }
 
}else{
$isDisplayed="block";
}
 ?>

   </div>
   <h3 style="color: rgb(33, 0, 48);
font-size: 20px;display: <?php echo $isDisplayed ?>;
font-family: 'Fredoka One',cursive;margin-left: 100px;">you have no friends yet on musiks</h3>
   </div>

   <style>
 #loginTab{
   float: left;
   width: 150px;

 }
 #signupTab{
   float: right;
   width: 150px;
 }
 #signupTab button{
  background-color: transparent;
  background-repeat: no-repeat;
  overflow: hidden;
  border: 0;
  font-size: 20px;
  cursor: pointer;
  color: white;  
  margin-top: 2%;
  padding-left: 20%;

  font-family: 'Fredoka One', cursive;
 }
  #loginTab button{
  background-color: transparent;
  background-repeat: no-repeat;
  overflow: hidden;
  border: 0;
  margin-top: 2%;
  font-size: 20px;
color: white;
padding-left: 10%;
  cursor: pointer;
  font-family: 'Fredoka One', cursive;
 }
 
#tab{
   width: 350px;
   height: 50px;
   margin-top: 100px;
   margin-left: 8%;
    border-radius: 30px;
    border: var(--main-color2) 4px solid;
  
 } 
       :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
         h2 {
    color: white;
     font-size: 20px;
     font-family: 'Fredoka One',cursive;
     margin-top: 10px;

 }
      
 
   </style>
      <script>
        var tabL=document.getElementById('loginTab')
   var tabS=document.getElementById('signupTab')

   tabS.style.background='rgb(170, 0, 142)'
   tabS.style.height='45px'
   tabS.style.width='150px'
   tabS.style.borderRadius='20px'

 

 
   </script>
</body>
</html>
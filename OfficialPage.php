<?php
  include('userData.php');
session_start();
if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
$id=$_SESSION['userid'];
$DB=new User();
$res=$DB->checkUser($id);
if($res){
 $userData=new User();
$user_data=$userData->getUserData($id);

  if(!$user_data){
  header('Location: registration.php?section=default');
}
  }
else{
  header('Location: registration.php?section=default');
}
}
else{
  header('Location: registration.php?section=default');
}

  $id=$_SESSION['userid'];


  $countNotif=$DB->countNotif($id);

?>
<!DOCTYPE html>
<html>
 
  <title>Musiks</title>
           <head>
 
           <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="officialPage.css" >
           </head>
<body>
 
<form method="get" action="OfficialPage.php">

  <div class="topDiv container" >
    <div class=" row">

  <div class="d-none d-md-block col-2">
      <a href="officialPage.php"><img  class="logo"  src="assets/musiksPng.png " style="width: 120px;height: 60px;"></a>
    </div>
                 
  <div class=" col-3 col-md-6 ">
   <input  name="searchFor" class="searchBar w-100 w-lg-100" type="text"   placeholder="Search...">
 
 
</div>
  <div  class="col-7 col-md-4  ">

  <h2  id="UsernameHome" ><?php echo "Hi There, " . $user_data['username']?></h2>

<div class="accountDiv">
  <?php
  if($user_data['photo_profile']=="null"){
    $image="assets/account.png";
  }else{
    $image=$user_data['photo_profile'];
  }
  ?>

  <img onclick="accountClick()" class="accountIcon" src="<?php echo $image?> " style="width: 35px;height: 35px;">
<div id="accountListDiv"   class="accountListDiv  ">
  <ul >
    <li class="AccountTitle">Account</li>

    <li><a style="text-decoration: none;color: white;" href="officialPage.php?section=profile_mine"  onclick="myaccount();">my account</a></li>
    <li><a style="text-decoration: none;color: white;" href="changePic.php"  onclick="changePic();">change picture</a></li>

    <li ><a style="text-decoration: none;color: white;" href="#"  onclick="support();">support</a></li>
    <li><a style="text-decoration: none;color: white;" href="#"  onclick="community();">community&feedback</a> </li>
    <li> <a style="text-decoration: none;color: white;" href="#"  onclick="setting();">setting</a></li>
    <li><a style="text-decoration: none;color: white;" href="logout.php"  onclick="logout();">log out</a> </li>
    <li> <a style="text-decoration: none;color: white;" href="aboutus.php"  onclick="aboutus();">about us</a></li>

  </ul>
</div>
</div>  
<a href="officialPage.php?section=share">

<img onclick="addPost();" id="add" src="assets/add.png" >

</a>
          </div>
          </div>
          </div>

   </form>

    <div class="row">

<div class="col-1 col-lg-3 ">
   <ul id="menu" >
      <li  ><a href="officialPage.php?section=home" >
        <img  src="assets/home.png" style="margin-right: 5px; width:30px;height: 28px;"></a><a style="text-decoration: none;" href="officialPage.php?section=home"  onclick="homeClick();"   id="HomeMenu" class="d-none d-lg-inline-block">Home</a></li>
      <li><a href="officialPage.php?section=mostPopular" ><img  src="assets/fire.png"
       style="margin-left: 4px;margin-right: 5px; width:22px;height: 28px;"></a><a style="text-decoration: none;" href="officialPage.php?section=mostPopular"   onclick="PlaylistsClick();" id="PlaylistsMenu" class="d-none d-lg-inline-block">Most Popular</a></li>
      <li><a href="officialPage.php?section=friends" ><img  src="assets/community.png"
       style="margin-right: 5px; width:28px;height: 28px;"></a><a style="text-decoration: none;" href="officialPage.php?section=friends"   onclick="friendsClick();" id="FriendsMenu" class="d-none d-lg-inline-block">Friends</a></li>
        <li ><a href="officialPage.php?section=notifications" >
          <img  src="assets/notifications.png" 
        style="margin-right: 5px; width: 26px;height: 28px;"></a>
        <a style="text-decoration: none;" 
        href="officialPage.php?section=notifications"  
        onclick="NotificationsClick()"  id="NotificationsMenu" class="d-none d-lg-inline-block">
        Notifications</a>
        <div style="
          font-size: 15px;width: 10px;height: 10px;
          background-color: rgb(170, 0, 142);border-radius: 50%;
          display: <?php echo is_array($countNotif)? "inline-block":"none" ?>;
          "></div>
      </li>
  
        <li><a href="officialPage.php?section=favorite" >
          <img  src="assets/favorites.png" style="margin-right: 5px; width:28px;height: 26px;"></a><a  style="text-decoration: none;" href="officialPage.php?section=favorite"  onclick="favoriteClick();" id="FavouritesMenu" class="d-none d-lg-inline-block">Favourites</a>
           
        </li>
 
      </ul>
 
</div>
   
      <div id='details'  class=" col-6 col-lg-9 ">
 <?php
 $section='default';
 if(isset($_GET['section'])){
   $section=$_GET['section'];
 }
 $searchFor="";
 if(isset($_GET['searchFor'])){
   include_once('searchFor.php');
   $section="searchFor";
 }
 

  if($section=='home'){
   include_once('home.php');
 } if($section=='friends'){
  include_once('myNotFollowing.php');
} if($section=='notifications'){
  include_once('notifications.php');
}  if($section=='mostPopular'){
  include_once('mostPopular.php');
}   if($section=='favorite'){
  include_once('favourites.php');
}if($section=='profile'){
  include_once('friendProfile.php');
}
if($section=='notFound'){
  include_once("notFound.php");
}
if($section=='share'){
  include_once('addPost.php');
}
if($section=='player'){
  include_once('player.php');
}if($section=='whoLiked'){
  include_once('whoLiked.php');
}if($section=='delete'){
  include_once('deletePost.php');
}if($section=='profile_mine'){
  include_once('profile.php');
}if($section=='edit_my_profile'){
  include_once('myaccount.php');
}if($section=='category'){
  include_once('category.php');
}if($section=='add_new_friends'){
  include_once('myNotFollowing.php');
}if($section=='my_friends'){
  include_once('myFollowing.php');
}
if($section=="default"){
  include_once('home.php');
}if($section=="deleteFavorite"){
  include_once('deleteFav.php');
}
 ?>
 
  </div>
       
  </div>


   
    
 <script >
   var account=document.getElementById('accountListDiv');
   var isDisplayed=0;
 function accountClick(){
    if(isDisplayed==0){
       account.style.display='block';
       isDisplayed=1;
   }else{
    account.style.display='none';
       isDisplayed=0;
   }
 }
 
 </script>

</body>
</html>
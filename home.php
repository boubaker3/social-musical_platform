 <?php
 include_once'userData.php';
  $id=$_SESSION['userid'];
$user=new User();
$friends=$user->getFriends($id); 
$res=$user->getFollowingPosts($id);
$ids=false;
if(is_array($res)){
  $ids=array_column($res,"userid");
  $ids=implode("','",$ids);
}
 $posts=$user->getPostDataHome($ids);
?>
<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="home.css">
</head>

<body >
  <div id="parent">

<div id="rightDiv" class="d-none d-lg-block" >
  <?php
 if($friends){
    foreach($friends as $FRIENDS_ROW){
include('friendsDesign.php');
    }
 
}
 ?>

<a href="OfficialPage.php?section=friends"><button  onclick="seemore()" id="seemore">see more</button></a>
  </div>
<div  id="leftDiv">
        <?php
        if($posts){
            foreach($posts as $ROW){
 
                $user=new User();
    $ROW_USER=$user->getUserData($ROW['userid']);

         include ("postDesign.php");
     
            }


        }
       
        
        
        ?>


    </div>
    </div>

    <style>

::-webkit-scrollbar {
    width: 8px;
  
   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
    border-radius: 8px;
  
  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
    border-radius: 8px;
  }
  :root{
    scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
    scrollbar-width: thin !important;
     
  }
    </style>
  <script>
  function seemore(){
    
window.location.replace('friends.php');
  }

  </script>
  
</body>

</html>

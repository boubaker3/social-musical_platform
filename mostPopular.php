<?php
include_once'userData.php';
$user=new User();
$id=$_SESSION['userid'];
$res=$user->getPopulars($id);
 
?>
<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="playlists.css"></head>

<body>
    <div  id="parent">
    <h2>Most Liked songs on musiks</h2>
<?php
 if($res){
    foreach($res as $ROW){

        $user=new User();
$ROW_USER=$user->getUserData($ROW['userid']);

 include ("postDesign.php");

    }
}
?>
    </div>
    
<style>
    #parent{
   
        margin-top: 75px;
width: 600px;
margin-left: 50px;
    }
    h2{
        color: white;
        font-family: 'Fredoka One',cursive;
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
    border-radius: 8px;
  }
  :root{
    scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
    scrollbar-width: thin !important;
     
  }
</style>
</body>

</html>

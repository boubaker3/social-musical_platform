<?php
include_once'userData.php';
 $user=new User();
$id=$_SESSION['userid'];
$favoritesRes=$user->getFavorites($id);
$favoritesClmns=false;
if(is_array($favoritesRes)){
    $favoritesClmns=array_column($favoritesRes,"postid");
    $favoritesClmns=implode("','",$favoritesClmns);
}
$favorites=$user->getFavoritesPost($favoritesClmns);


?>
<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="favourites.css"></head>

<body >
    <div id="parent">
         <h2 >my Favorite List</h2>
    <?php
    if($favorites){
        foreach($favorites as $favoritesRow){
            include('favoriteDesign.php');
        }
    }
?>
    </div>
   
</body>
<style>
    
:root {
  --main-color:#160020ff;
  --main-color2:rgb(170, 0, 142);
}
 
h2{
    color: white;

    font-size: 30px;
     font-family: 'Fredoka One',cursive;
}
#parent{
    margin-top: 75px;
    width: 800px;
}


    </style>
</html>

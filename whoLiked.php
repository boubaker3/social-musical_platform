<?php
 include_once'userData.php';
if(isset($_GET['id'])&&is_numeric($_GET["id"])){
    $id=$_GET['id'];
    $user=new User();
    $postLikes=$user->getpostLikes($id);
    $postLikesclmn=false;
    if(is_array($postLikes)){
        $postLikesclmn=array_column($postLikes,"userid");
        $postLikesclmn=implode("','",$postLikesclmn);
    }
    $whoLiked=$user->getWhoLiked($postLikesclmn);
    if($whoLiked){
        for($i=0;$i<count($whoLiked)-1;$i++){
            $min=$i;
            for($j=$i+1;$j<count($whoLiked);$j++){
                $min=$j;
                $temp=$whoLiked[$min];
                $whoLiked[$min]=$whoLiked[$i];
                $whoLiked[$i]=$temp;

            }
        }
    }else{
        if(headers_sent()) {
            echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
           
         
           }else{
             header('Location: officialPage.php?section=notFound');
           }
    }
   


}else{
    if(headers_sent()) {
        echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
       
     
       }else{
         header('Location: officialPage.php?section=notFound');
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>
<body >

<div id="container" style="padding: 10px;
 width: 400px;height: 400px;
 border-radius: 10px;">
 <h2 style="font-family: 'Fredoka One',cursive;color: white;">Likes</h2>

        <?php
        if($whoLiked){
            foreach($whoLiked as $postLikesRow){
                include('whoLikedDesign.php');
            }
        }
        
        ?>
    </div>
    <style>
#container{
    overflow-y: auto;
  margin-top: 100px;
  margin-left: 75px;
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
</body>
</html>
<?php
include_once'userData.php';
$user=new User();
$find="";
if(isset($_GET['searchFor'])){
  $find=$_GET['searchFor'];

}else{
  if(headers_sent()) {
    echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
   
 
   }else{
     header('Location: officialPage.php?section=notFound');
   }
}
 
$res=$user->find(addslashes($find));
 $res2=$user->findPost(addslashes($find));
if (!$res||!$res2){
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
   
</head>
<body>

    <div id="parent">
     <a href="OfficialPage.php?searchFor=<?php echo $find ?>&genre=people"> <button style="display: inline-block;">
People
      </button></a>
      <a href="OfficialPage.php?searchFor=<?php echo $find?>&genre=posts"> 
      <button>
        Posts
      </button></a>
      <h3 style="color: white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Results of <?php echo $find ?></h3>
   <?php
    if($res){
      if(isset($_GET['searchFor'])&&isset($_GET['genre'])&&$_GET['genre']=="people"){
        foreach($res as $findRow){
          include('findUser.php');
      }
    
      }  else if(!isset($_GET['genre'])){
        foreach($res as $findRow){
          include('findUser.php');
      }
      }
       
    }else if($res2){
      if(isset($_GET['searchFor'])&&isset($_GET['genre'])&&$_GET['genre']=="posts"){
        foreach($res2 as $ROW){
          $user=new User();
          $ROW_USER=$user->getUserData($ROW['userid']);
               include ("postDesign.php");
      }

      }
    }
    
    
    ?>
    
    </div>
  <style>
#parent{
    margin-top: 100px;
margin-left: 120px;
width: 100%;}
button{
  font-size: 20px;
  color: white;
  font-family: 'Fredoka One',cursive;
  background-color: rgb(33, 0, 48);
  border: 0;
  border-radius: 20px;
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
 <?php
 if(!$Row){
  if(headers_sent()) {
    echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
   
 
   }else{
     header('Location: officialPage.php?section=notFound');
   }
 }
 ?>
  
  <div style="width: 100%; padding-right: 10px; margin-bottom: 2%; height: 100%;background-color: rgba(33, 0, 48, 0.267);border-radius: 20px;">
 
 <a href="friendProfile.php?id=<?php echo $ROW_USER['userid'] ?>"><img src="<?php echo $ROW_USER['photo_profile']?>" width="50px" height="50px " style="  
 border-radius: 30px;float: left;margin-left: 10px;margin-top: 10px;object-fit: cover;
"></a>
 <a href="officialPage.php?id=<?php echo $ROW_USER['userid'] ?>&section=profile">
 <h2 style="margin-left: 10px; margin-top: 10px;color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
font-size: 16px;display: inline-block;float: left;"><?php echo $ROW_USER['username'] ?></h2></a><br>
  <?php
  $user=new User();
  $res=$user->isMine($_SESSION['userid'],$ROW['postId']);
  $show="none";
  if($res){
    $show="block";
  }
  else{
    $show="none";

  }
  
  ?>
   <a href="deletePost.php?id=<?php echo $ROW['postId'] ?>&type=post"><button onclick="more()" type="button" id="more" style="  display: <?php echo $show ?>;float: right;">
  <img  src="assets/delete.png" width="30px" height="32px" ></a>

  </button>
 
  
  
  <div style=" font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
font-size: 15px;color: white;margin-left: 5%;margin-top: 10%;margin-bottom: 2%;">
<p ><?php echo $ROW['status']?></p>
</div>
<div style="  width: 200px;height: 200px;position: relative;display: inline-block;" >

<img  src="<?php echo $ROW['cover'] ?>" 
style="object-fit: cover; border-radius: 10px;float: left;margin-top: 1px; margin-left: 5%;width: 
200px;height: 200px;position: absolute; " >
<a   href="officialPage.php?id=<?php echo $ROW['postId']?>&type=favorite&section=player">
<button name="playbtn" type="button" id="playBtn" onclick="playAudio()" style="margin-left: 7%;margin-top: 70%; position: relative;border-radius: 5px;padding-left: 15px;padding-right: 10px;padding-top: 10px
;padding-bottom: 10px;  background-color: var(--main-color) ;opacity: 0.7;" src="assets/play.png" width="50px" height="50px"  >
<i><img id="playIcon" src="assets/play.png" width="20px" height="20px"></i>
</button></a>
 </div>
 
    
 <div style="width: 150px; display: inline-block;float:left;position: absolute;margin-left: 15px;margin-top: 20px;">
 
 <h2 style="margin-left :5px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
 font-size: 24px;color: white; word-wrap: break-word;"> <?php echo   $ROW['title'] ?></h2>
  
 <h2 style="margin-left :5px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
 font-size: 18px;color: white;"><?php echo  $ROW['artist'] ?></h2> 
  </div>
  <?php
 include_once'userData.php';
 $id=$_SESSION['userid'];
 $user=new User();
 $res=$user->getLikes($id);
 $color="assets/unliked.png";
  if(is_array($res)){
    $ids=array_column($res,"userid");
    if(in_array($ROW['postId'],$ids)){
      $color="assets/liked.png";
   }
   else{
    $color="assets/unliked.png";
 
   }
 }
 $whoLiked= "no one liked this song yet";
 if($ROW['likes']==0){
   $whoLiked= "no one liked this song yet";
 }else if($ROW['likes']==1){
  $whoLiked=$ROW['likes'] ." "."person liked this song";
 }
 else if($ROW['likes']>1){
  $whoLiked=$ROW['likes'] ." "."persons liked this song";
 }
  ?>
 <div style="margin-top: 10px;margin-left: 90px;">


     <a   onclick="ajax_like_post(event)"  
     href="like.php?type=post&id=<?php echo $ROW['postId'] ?>&owner=<?php echo $ROW_USER['userid'] ?>"
     ><button type="button">
   <img id="likeImg" src="<?php echo $color?>" width="30px" height="28px" >
 </button>
    </a>



     <div   style="display: inline-block;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 float: right;font-size: 12px;opacity: 0.5;">
      <a style="color: white;text-decoration: none;font-size: 12px; margin-left: 600px;display: inline-block;width: 150px;" 
      href="officialPage.php?section=whoLiked&id=<?php echo $ROW['postId']?>"><?php echo $whoLiked?></a>

 </div>
 </div>

 <div  style=" background-color: var(--main-color2); height: 1px;  margin-left: 10%;
margin-right: 10%;box-shadow: 0 0 1em var(--main-color2);margin-top: 20px; ">
<a></a> 
</div> 
 
  

   


 
</div>

 <style>
    button{
        background-color: transparent;
        background-repeat: no-repeat;
        cursor: pointer;
        overflow: hidden;
        border: 0;
    }
    body{
  
 overflow-x: hidden;
   background-color: var(--main-color) ;    
}
::-webkit-scrollbar {
    width: 15px;
   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
    border-radius: 8px;
  background-clip: padding-box;  
  }

 #playBtn:hover{
  width: 50px;
  height: 50px;   
  box-shadow: 0 0 0.5em black;
  transition-duration: 1s;
 }
 #playBtn:hover #playIcon{
   height: 25px;
   width: 25px;
 }
 
#more:hover{
   opacity: 0.2;
  
  transition-duration: 1s;
  


} 
 
 
 
:root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
 
 
 
</style>

 <script type="text/javascript">
 
   function send_ajax_data(data,element){

    var ajax=new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
      if(ajax.readyState==4 && ajax.status == 200){

        
        element.innerHTML=ajax.responseText ;

      }
 
    });
    data=JSON.stringify(data);
    
    ajax.open("post","ajax.php");
      ajax.send(data);
   }
  function ajax_like_post(e){
 
    e.preventDefault();
    var hrefLink=e.currentTarget.href;
    var data={};
     data.link=hrefLink;
    data.action="like";
     send_ajax_data(data,e.currentTarget);
     
 
   }
 
  
 </script>
 
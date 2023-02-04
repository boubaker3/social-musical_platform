 
   <?php
   $notication="Started following you on Musiks";
   if($notificationsRow['type']=="post"){
    $notication="Liked your post";
 
   }
   
   ?>
   <a style="text-decoration: none;" href="officialPage.php?id=<?php echo $notificationsMaker['userid']?>&section=profile">
    <div >
    <img style="position: absolute;object-fit: cover; border-radius: 25px;"
  src="<?php echo $notificationsMaker['photo_profile']=="null"?"assets/account.png":$notificationsMaker["photo_profile"] ?>" width="50px" height="50px"> 
 
  
  <h2 style="margin-left: 60px; display: inline-block; color: white; text-decoration: none;font-size: 18px;
  font-family: 'Fredoka one',cursive;" 
   >
<?php echo $notificationsMaker['username'] ?></h2> 
<h3 style="display: inline-block; color: white;   font-size: 15px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
 "><?php echo $notificationsRow['type']=="post" ?
  $notication ." ". $notificationsUser['title'] :$notication  ?></h3>
 <img style="position: absolute;object-fit: cover; border-radius: 10px;margin-left: 5px; display: <?php 
 echo $notificationsRow['type']=="post"? "inline-block":"none" ?>;"
  src="<?php echo $notificationsUser['cover'] ?>" width="50px" height="50px"> 
 
  </div>
  </a>
  <a style="color: white; margin-left: 100px;font-size: 12px;position: absolute;"><?php echo substr($notificationsRow['date'],5,11) ?></a>

  <div  style="width: 200px; background-color: var(--main-color2); height: 1px;  margin-left: 10%;
margin-right: 10%; margin-top: 30px;margin-bottom: 10px;">
<a></a> 
</div>
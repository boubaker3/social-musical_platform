<?php
 include_once'userData.php';
   $id=$_SESSION['userid'];
$user=new User();
 $notifications=$user->getNotifications($id);
 if(isset($_GET['section'])){
  $user->seenNotif($id);
}


 ?>
<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="notifications.css"></head>

<body >
  <div  id="parent">

    <h2 style="color: white;font-family: 'Fredoka One',cursive;">Earlier</h2>
    <div  >
    <h3  style="color: rgb(50, 0, 73);font-family: 'Fredoka One',cursive;font-size: 20px;">Followers</h3>
    <?php
        if($notifications){
            foreach($notifications as $notificationsRow){
              $notificationsMaker=$user->getNotificationsMaker($notificationsRow['notifications']);
              $notificationsUser=$user->getNotificationsData($notificationsRow['notificationPost']);

                    include ("notifDesignFollowers.php");
                 
            }
        }
       
        
        
        ?>
    </div>
   
  </div>
<style>

:root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
body{
  background-color: var(--main-color);

 }
 #parent{
   
margin-top: 75px;
width: 600px;
margin-left: 50px;
 
 }
 
</style>


</body>

</html>

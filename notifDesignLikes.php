 
 
  <div style=" width: 400px;">
 <img src="<?php echo $notificationsPostRow['cover']=="null"?"assets/account.png":$notificationsPostRow['cover'] ?>" style="width: 40px;
 height: 40px;border-radius: 5px;">
 
<a href="officialPage.php?id=<?php $notificationsPostRow['postId']?>&section=profile_mine" style="
position: absolute; color: white;text-decoration: none;
 margin-left: 5px;margin-top: 10px; display: inline-block;
 font-family: 'Fredoka One',cursive;font-size: 15px">
<?php echo "your post ".$notificationsPostRow['title']." is Liked"
 ?></a>
  </div>
<div  style="width: 200px; background-color: var(--main-color2); height: 1px;  margin-left: 10%;
margin-right: 10%; margin-top: 30px;">
<a></a> 
</div>

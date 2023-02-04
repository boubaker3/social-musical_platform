<span style="float: left;">
<img style=" border-radius: 20px;object-fit:cover" 
src="<?php echo $FRIENDS_ROW['photo_profile']=="null"?"assets/account.png":$FRIENDS_ROW['photo_profile'] ?>" width="40px" height="40px"><br>
<a   href="officialPage.php?id=<?php echo $FRIENDS_ROW['userid'] ?>&section=profile"
 style="padding: 10px;  font-size: 15px;color: white;opacity: 0.8; 
font-family: 'Fredoka One',cursive;text-decoration: none;
" ><?php echo $FRIENDS_ROW['username'] ?></a> 
</span>  
 
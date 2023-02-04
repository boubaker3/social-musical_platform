<div >
<img style="width: 60px;height: 60px;border-radius: 50%;display: inline-block;object-fit: cover;" 
src="<?php echo $findRow['photo_profile']=="null"?"assets/account.png":$findRow['photo_profile'] ?>">
<h3 style=" margin-left: 10px;font-size: 20px; 
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;display: inline-block; 
color: white; "><?php echo $findRow['username'] ?></h3><br>
 <a href="OfficialPage.php?section=profile&id=<?php echo $findRow['userid'] ?>"><button style="color: white;font-size: 15px;
 background-color: rgb(33, 0, 48);border: 0;border-radius: 20px;padding: 10px;
 font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-left: 150px;display: inline-block;width: 150px;
 ">Visit profile</button></a>
</div>

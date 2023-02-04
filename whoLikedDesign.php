<?php

$sec="default";
if($_SESSION['userid']==$postLikesRow['userid']&&is_numeric($_SESSION['userid'])){
$sec="profile_mine";
}else if($_SESSION['userid']!=$postLikesRow['userid']&&is_numeric($postLikesRow["userid"])){
    $sec="profile";
}else{
    if(headers_sent()) {
        echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
       
     
       }else{
         header('Location: officialPage.php?section=notFound');
       }
}

?>
<div style="border-radius: 20px;background-color: rgb(33, 0, 48);height: 50px; padding-left: 10px;">

<img src="<?php echo $postLikesRow['photo_profile']?>"
style="object-fit: cover; margin-top: 5px; width: 40px;height: 40px;border-radius: 50%;">
<a style="color: white;text-decoration: none;"
 href="officialPage.php?id=<?php echo $postLikesRow['userid'] ?>&section=<?php echo $sec ?>">
 <h3 style="display: inline-block; margin-left: 10px;
color: white;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size: 18px;">
<?php echo $postLikesRow['username'] ?></h3></a>
</div>

<br>

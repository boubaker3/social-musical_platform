<?php


?>
 <div id="container" >

  <img style="float: left; object-fit: cover; width: 50px;
  height: 50px;border-radius: 50%;" 
  src="<?php echo $rowUser['photo_profile']=="null"?"assets/account.png": $rowUser['photo_profile'] ?>">
  <a href="officialPage.php?section=chat&id=<?php echo $rowUser['userid'] ?>">

<h3 style="display: block;  margin-left: 15px;float: left; color: white;font-size: 15px;
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $rowUser['username']?></h3>

</a> 
<?php
$online="none";
if($rowUser['date']==date(' Y-m-d H:i:s')){
  $online="block";
}
?>
<div style="margin-left: 50px;display: <?php echo $online?>;
 width: 8px;height: 8px;border-radius: 50%;background-color: white;"></div>

<?php
    $byme="";
 if(!empty( $showMsgRow['message'])){
  $showMsgRow['message']=$showMsgRow['message'];
  if($showMsgRow['seen']=='1'){
    $showMsgRow['message']='sent you a message';
  
  }
  if(strlen($showMsgRow['message'])>12 && $showMsgRow['message']!='sent you a message'){
    $showMsgRow['message']=substr($showMsgRow['message'],0,12)."...";

  }
  if($showMsgRow['sender']==$_SESSION['userid']){
    $byme="by me";

  }
}else{
  $showMsgRow['message']="";

}
$msgColor="gray";
$msgFont="sans-serif";
if($showMsgRow['sender']!=$_SESSION['userid']&&$showMsgRow['seen']==0){

$msgColor="white";
$msgFont="'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif";
}
?>
 <a style="font-size: 12px;float: right;color: gray;"><?php echo $byme ?></a>
<br>
<p style="font-size: 15px;color: gray; float: right;left: 0;display: inline-block;color: <?php echo $msgColor?>;
font-family: <?php echo $msgFont ?> "><?php echo $showMsgRow['message'] ?></p>
</div>
<br>
<style>
#container{
 width: 250px;
 height: 60px;
padding: 10px;
 }
 #container:hover{
   background-color: rgba(33, 0, 48, 0.5);
 }
 

</style>
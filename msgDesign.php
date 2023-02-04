<?php
$bg="";
$mg="";
$seen="";
 if($showMsgRow['sender']==$_SESSION['userid']){
    $bg="rgba(255, 0, 212, 0.11)";
    $mg="80px";
if($showMsgRow['seen']=="0"){
    $seen="";
}else{
    $seen="seen";

}

}else{
    $bg="#160020ff";
    $mg="0";
    if($showMsgRow['received']=="0"){
        $seen="";
        
    }else{
        $seen="received";
    
    }

}

?>
<div style="
background-color: <?php echo $bg ?>;
margin-left: <?php echo $mg?>;" id="dialogLyrics"  >
 <p style="word-wrap: break-word;"><?php echo $showMsgRow['message']?></p>
 <a style="color: gray;font-size: 12px;float: right;margin-right: 10px;"><?php echo $seen?></a>
 <a style="color: gray;font-size: 12px;float: right;margin-right: 10px;"><?php echo 
 substr($showMsgRow['date'],2,14) ?></a>

</div>
 <br>
 <style>
     #dialogLyrics{
     
     font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 250px;
      height: auto;
      color: white;
      border: 0;
       border-radius: 20px;
       
       padding-left: 5px;
       padding-top: 5px;

 
}
 </style>
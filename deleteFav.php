<?php
$type="";
$id="";
if($_GET['type']=="favorite" && isset($_GET['id']) ){
    $type=$_GET['type'];
    $id=$_GET['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<div style="  
  margin-left: 75px;width: 500px; margin-top: 150px; color: white; border-radius: 20px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
">
<h3 style="font-size: 15px;">Are your sure you wanna remove this song from your favorite?</h3>
<form method="post" >
<a href="delete.php?id=<?php echo $id?>&type=favorite&order=delete">
<button type="button"  name="remove">remove</button></a>
<a  href="delete.php?id=<?php echo $id?>&type=favorite&order=cancel">
<button type="button" name="cancel" style="margin-left: 25px">cancel</button>

</a></form>


</div>
<style>
      :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
    body{
background-color: var(--main-color);
  overflow-x: hidden;
}
button#lyricsBtn{
    font-family: 'Fredoka One',cursive;
    background-color: transparent;
    background-repeat: no-repeat;
    cursor: pointer;
    overflow: hidden;
     margin-right: 50px;
    border: var(--main-color2) 3px solid;
    width: 100px;
   height: 40px;
   color: white;
   font-family: 'Fredoka One',cursive;
   font-size: 20px;
    border-radius: 20px;   
}
button{
    background-color: transparent;
    background-repeat: no-repeat;
    cursor: pointer;
    overflow: hidden;
     margin-right: 50px;
    border: var(--main-color2) 3px solid;
    width: 100px;
   height: 40px;
   color: white;
   font-family: 'Fredoka One',cursive;
   font-size: 20px;
    border-radius: 20px;   
}
button:hover{
    background-color: var(--main-color2);
    box-shadow: 0 0 1em var(--main-color2);
    transition-duration: 0.5s;
}
</style>

</body>
</html>
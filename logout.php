<?php
session_start();
if(isset($_POST['cancel'])){
    header('Location: officialPage.php');
}
if(isset($_POST['logout'])){
    if(isset($_SESSION['userid'])&& is_numeric($_SESSION['userid'])){
        unset($_SESSION['userid']);
        header('Location: welcomePage.php');

    }
}
?>
<!Doctype html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div class=" row p-4">
<p class="col-12 text-center" style="font-family: 'Fredoka One',cursive;
font-size: 20px;color: white;
margin-top: 10%;margin-bottom: 10%;">Are you sure you want to log out?</p>
<form method="post">
   
    
<button class="col-12 col-md-6 ms-md-3" style="border-radius: 20px;" id="logout" name="logout" >Log out</button>
 
<button class="col-12 col-md-6 ms-md-3" style="border-radius: 20px;"  id="cancel" name="cancel"  >Cancel</button> 
 
 
</form>
</div>
<body >
    
<style>
 :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
} 
#logout  {
  background-color: transparent;
background-repeat: no-repeat;
cursor: pointer;
overflow: hidden;
border:  rgb(170, 0, 142) 4px solid;
font-family: 'Fredoka One', cursive;
color: white;
font-size: 25px;
width: 200px;
 border-radius: 20px;
box-shadow: 0 0 0.5em  rgb(170, 0, 142);
 text-shadow: 0 0 0.25em  rgb(170, 0, 142);
height: 50px;
 }
 #logout:hover{
  background-color: var(--main-color2);
  box-shadow:  0 0 0.5em var(--main-color2);
  transition-duration: 500ms;
  height: 75px;
  width: 250px;
  font-size: 30px;

} 
#cancel {
    background-color: transparent;
background-repeat: no-repeat;
cursor: pointer;

overflow: hidden;
border:  rgb(170, 0, 142) 4px solid;
font-family: 'Fredoka One', cursive;
color: white;
font-size: 25px;
width: 200px;
 border-radius: 20px;
box-shadow: 0 0 0.5em  rgb(170, 0, 142);
 text-shadow: 0 0 0.25em  rgb(170, 0, 142);
height: 50px;
float: right;
 
 
 }
 #cancel:hover{
    height: 75px;
  width: 250px;
  font-size: 30px;
  background-color: var(--main-color2);
  box-shadow:  0 0 0.5em var(--main-color2);
  transition-duration: 500ms;
} 
div{
    overflow: hidden;
     margin-top: 10%;
     border-radius: 20px;
     
 }
body{
 
    height: 100%;
   
    overflow: hidden;
    background-color: var(--main-color) ;    
}
 
</style>
 

</body>

</html>

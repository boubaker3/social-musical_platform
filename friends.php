<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>
<body>
<div id="tab">
 <div onclick="loginTabClick();" id="loginTab">
<a href="officialPage.php?section=add_new_friends"><button>add Friends</button></a>
 </div>
<div onclick="signupTabClick();" id="signupTab">
  <a  href="officialPage.php?section=my_friends"><button>my Friends</button></a>
</div>
</div>

  <style>
 
 :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
#loginTab{
   float: left;
   width: 200px;

 }
 #signupTab{
   float: right;
   width: 200px;
 }
 #signupTab button{
  background-color: transparent;
  background-repeat: no-repeat;
  overflow: hidden;
  border: 0;
  font-size: 20px;
  cursor: pointer;
  color: white;  
  margin-top: 5%;
  padding-left: 20%;

  font-family: 'Fredoka One', cursive;
 }
  #loginTab button{
  background-color: transparent;
  background-repeat: no-repeat;
  overflow: hidden;
  border: 0;
  margin-top: 5%;
  font-size: 20px;
color: white;
padding-left: 20%;
  cursor: pointer;
  font-family: 'Fredoka One', cursive;
 }
#tab{
   width: 400px;
   height: 50px;
     border-radius: 30px;
    border: var(--main-color2) 4px solid;
 
 } 
  
       
 
   </style>
   <script>
           
   var tabL=document.getElementById('loginTab')
   var tabS=document.getElementById('signupTab')

 tabL.style.background='rgb(170, 0, 142)'
 tabL.style.height='50px'
 tabL.style.width='200px'
 tabL.style.borderRadius='20px'

 

    function loginTabClick(){
 
  tabL.style.background='rgb(170, 0, 142)'
 tabL.style.height='50px'
 tabL.style.width='200px'
 tabL.style.borderRadius='20px'
 tabS.style.background='#160020ff'


    }
 function signupTabClick(){
 
  
  tabS.style.background='rgb(170, 0, 142)'
 tabS.style.height='50px'
 tabS.style.width='200px'
 tabS.style.borderRadius='20px'
 tabL.style.background='#160020ff'
 tabL.style.height='50px'
 tabL.style.width='200px'
 tabL.style.borderRadius='20px'
    }
   </script>
</body>
</html>
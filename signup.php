<?php
 include('connect.php');
 session_start();
 $errors="";
 if(! isset($_GET['section'])){
  if(headers_sent()) {
    echo '<script type="text/javascript">window.location.href="registration.php?section=signup"</script>';
   
 
   }else{
     header('Location: registration.php?section=signup');
   }
 }
  if (isset($_POST['signupClick'])) {
  $usernameS=$_POST['usernameS'];
  $emailS=$_POST['emailS'];
  $passwordS=$_POST['passwordS'];
  $user_id=getUserId();
  $url_adress=strtolower($usernameS) . ".user";
  if($usernameS>15){
    $errors="username must be under 15 letters";
       }
       if($passwordS<8){
         $errors="password must be more than 8 letters";
    
       }
       if($passwordS>30){
         $errors="password is too big";
       }
  if(!empty($usernameS) || !empty($passwordS) || !empty($emailS)){
    $hashedpassword=password_hash($passwordS, PASSWORD_DEFAULT);
   $query="INSERT INTO users (userid,email,username,password,url_adress,photo_profile) VALUES 
   ('$user_id','$emailS','$usernameS','$hashedpassword','$url_adress','null')";
  $DB=new Database();
  $DB->save($query);
   
   header("Location: registration.php?section=default");
 die;
   }
  
}
 
  


 
 function getUserId(){
   $num=rand(4,19);
   $finalUserId="";
    for ($i=0; $i <$num; $i++) { 
     $newNum=rand(0,9);
     $finalUserId .=$newNum;
   }
   return $finalUserId;
 }
 
 ?>

<!Doctype html>
<html>
   
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login.css">
 </head>

<body >
<div class="container">
    <div class="row">
      <div class="col-12">
      <img  src="assets/musiksPng.png" width="120px" height="60px" style="margin-top: 2px;margin-left: 10px; position: fixed;">

      </div><br>
      
      <p class="text-center mt-4 mt-md-0"  style="font-family: 'Fredoka One', cursive;
 color: white;
 font-size: 20px;
  " id="continue"> to continue,signupto Musiks.</p> 
      
 
  
<div class="col-12">
<div class="col-md-4 col-8 p-0" id="tab">
 <div class="col-4"   id="loginTab">
<a href="registration.php?section=login"><button>Login</button></a>
 </div>
<div class="col-6"  id="signupTab">
  <a href="registration.php?section=signup"><button>Sign up</button></a>
</div>
 </div>
</div>


 


  <div id="SignupDiv"  >
<h2 style="color: white; font-family: 'Fredoka One', cursive;
font-size: 30px; margin-left: 0% auto ;">Sign up</h2>
<form method="post">
    <h2>Email adress</h2>
 <div  id="emailSignup" >
<input id="emailInput"  placeholder="email" type="email" name="emailS" >
</div>
<h2>Username</h2>

<div  id="usernameSignup">
    <input id="userInput"  placeholder="username" type="text" name="usernameS">
    </div>
<h2> Password</h2>
<div  id="passwordSignup">
<input id="passwordInput" placeholder="password" type="password" name="passwordS">
</div>
<label id="containerSignup">
  <input id="checkSignup" type="checkbox"    >
  <span id="checkMarkSignup">Remember me</span>
  </label>
<button type="submit" name="signupClick" id="SignupBtn">Sign up</button>
</form>
</div>
</div>
 <script>
   var cont=document.getElementById('continue')
   var divSignUp=document.getElementById('SignupDiv')
   var divLogin=document.getElementById('loginDiv')
    var tabS=document.getElementById('signupTab')

    tabS.style.background='rgb(170, 0, 142)'
    tabS.style.height='50px'
     tabS.style.borderRadius='20px'
tabS.style.paddingLeft='10%'

  
cont.innerText='To continue, log in to Musiks.'
cont.marginLeft="18%"
divSignUp.style.transitionDuration="1s";
  divSignUp.style.transitionDuration="1s";
 
    
 
 

 </script>
  
 
</body>



</html>
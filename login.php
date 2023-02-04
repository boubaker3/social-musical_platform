 <?php
 include('connect.php');
 session_start();
 $errors="";
 
 if(! isset($_GET['section'])){
  if(headers_sent()) {
    echo '<script type="text/javascript">window.location.href="registration.php?section=login"</script>';
   
 
   }else{
     header('Location: registration.php?section=login');
   }
 }
 
  
if(isset($_POST['loginClick'])){
  $emailL=addslashes($_POST['emailL']);
  $passwordL=addslashes( $_POST['passwordL']);
  $query="SELECT * FROM users WHERE email = '$emailL' LIMIT 1";
  $DB=new Database();
  $res=$DB->retrieve($query);
if($res){
$row=$res[0];
if(password_verify($passwordL, $row["password"])){

  $_SESSION['userid']=$row['userid'];
  
    header("Location: uploadPhoto.php");
   
}
else{
  $errors ="Wrong email or password";
  echo $passwordL;
  echo $row["password"];
}
}
else if(empty($passwordL) ||empty ($emailL)){
  $errors="make sure you filled out all the fields";
}
else{
  $errors ='there is no account with these infos';
}

  
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
      <div class="col-sm-1">
      <img  src="assets/musiksPng.png" width="120px" height="60px" style="margin-top: 2px;margin-left: 10px; position: fixed;">

      </div><br>
      
      <p class="text-center mt-4 mt-md-0"  style="font-family: 'Fredoka One', cursive;
 color: white;
 font-size: 20px;
  " id="continue"> Hello There,</p> 
      
 
  
<div class="col-12">
<div class="col-md-4 col-8 p-0" id="tab">
 <div class="col-6"   id="loginTab">
<a href="registration.php?section=login"><button>Login</button></a>
 </div>
<div class="col-6"  id="signupTab">
  <a href="registration.php?section=signup"><button>Sign up</button></a>
</div>
 </div>
</div>


 <div   id="loginDiv"   >
    <h2 style="color: white; font-family: 'Fredoka One', cursive;
    font-size: 30px; margin-left:0% auto;"> Login</h2>
<form method="post">
  <p style="float: right; color: rgb(170, 0, 142);font-size: 12px;font-family: 'Fredoka One', cursive;"><?php echo $errors?></p><br>
<h2>Email adress</h2>

<div   id="emailLogin">
<input name="emailL"  placeholder="Email" type="email">
</div>
<h2> Password</h2>
<div  id="passwordLogin">
<input name="passwordL" placeholder="password" type="password">
</div>
<h2 id="forgotTextLogin"> Forgot your password?</h2>
<label id="containerLogin">
<input id="checkLogin" type="checkbox"    >
<span id="checkMarkLogin">Remember me</span>
</label>
<button   name="loginClick" id="loginBtn">Login</button>
</div> 
</form>
 
</div>
</div>

  

 <script>
   var cont=document.getElementById('continue')
   var divSignUp=document.getElementById('SignupDiv')
   var divLogin=document.getElementById('loginDiv')
   var tabL=document.getElementById('loginTab')
   var tabS=document.getElementById('signupTab')

 tabL.style.background='rgb(170, 0, 142)'
 tabL.style.height='50px'
  tabL.style.borderRadius='20px'



  
cont.innerText='To continue, log in to Musiks.'
cont.marginLeft="18%"
   divLogin.style.transitionDuration="1s";
  divSignUp.style.transitionDuration="1s";
  divLogin.style.boxShadow='0 0 1em rgb(170, 0, 142)'

    
  
 
 

 </script>
  
 
</body>



</html>
<?php
include_once'userData.php';
include_once'connect.php';
     $id=$_SESSION['userid'];
    $user=new User();
    $data=$user->getUserData($id);
 if(isset($_POST['update'])){
   $email=addslashes($_POST['email']);
   $username=addslashes($_POST['username']);
   $password=addslashes(password_hash($_POST['password'],PASSWORD_DEFAULT));
   $query="UPDATE users SET email= '$email' , username='$username' , password='$password' WHERE userid= $id ";
   $DB=new Database();
   $DB->save($query);
   header('Location: officialPage.php?section=profile_mine');


 }
 if(isset($_POST['changepicture'])){
   header('Location: changePic.php');
 }



?>
<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    

<body >
  <div style="margin-top: 75px;">

  <span>
  <h2 
  style="font-family: 'Fredoka One', cursive;color: white;">My Account Setting</h2>
   </span>
<form method="post">
     <div>
     <?php
              if($data['photo_profile']=="null"){
                $image="assets/account.png";
              }else{
                $image=$data['photo_profile'];
              }

              ?>
<img style="object-fit: cover; border-radius: 10px;border-radius: 10px;background-color: rgb(33, 0, 48); padding: 2px;" height="150px" width="150px" src="<?php echo $image ?>">
   </div>
  
<h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
;font-size: 15px; color: white;">
you're enjoying Musiks for free now.</h2><br>

<div id="infosDiv"   class="pe-4">
<h2 style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
;font-size: 15px; color: white;">
Email:</h2><br>

<input name="email"  value="<?php echo $data['email']?>"  style="padding-left: 2%; color: white;   border: 0; outline-width: 0; width: 350px; height: 40px; background-color:rgb(33, 0, 48); border-radius: 20px;"><br>


<h2 style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
;font-size: 15px; color: white;">
Username:</h2><br>
<input name="username" value="<?php echo $data['username']?>"  style="padding-left: 2%; color: white;  border: 0; outline-width: 0; width: 350px; height: 40px; background-color:rgb(33, 0, 48); border-radius: 20px;"><br>


<h2 style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
;font-size: 15px; color: white;">
Password:</h2><br>
<input name="password" placeholder="your new password" style="padding-left: 2%; color: white; border: 0; outline-width: 0; width: 350px; height: 40px; background-color:rgb(33, 0, 48); border-radius: 20px;"><br>
<div id="update">

<button name="update" >Update profile</button>

</div>
</form>

</div>
 
</div>















<style>
 :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
} 
#update button{
  background-color: transparent;
background-repeat: no-repeat;
cursor: pointer;
overflow: hidden;
border:  rgb(170, 0, 142) 4px solid;
font-family: 'Fredoka One', cursive;
color: white;
font-size: 20px;
width: 200px;
margin-left: 50%;
border-radius: 20px;
box-shadow: 0 0 0.5em  rgb(170, 0, 142);
margin-top: 30px;
text-shadow: 0 0 0.25em  rgb(170, 0, 142);
height: 50px;
margin-bottom: 10px;
}
 #update button:hover{
  background-color: var(--main-color2);
  box-shadow:  0 0 1em var(--main-color2);
  transition-duration: 500ms;
}  
body{
 overflow-x: hidden;
background-color: var(--main-color) ;   
width: 100%; 
}
::-webkit-scrollbar {
    width: 8px;
   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
    border-radius: 8px;
  background-clip: padding-box;  
  }

  :root{
  scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
  scrollbar-width: thin !important;
   
}
input{
  outline-style: none;
}
</style>
</body>

</html>

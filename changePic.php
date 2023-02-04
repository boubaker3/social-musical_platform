<?php
 include('userData.php');
 require_once('connect.php');
session_start();
 
  
 
$userid=$_SESSION['userid'];
$user=new User();
$user_data= $user->getUserData($userid);
        if(isset($_POST['continuee'])){  
            
            if( isset($_FILES['fileToUpload']['name']) ){
                
                $filename="uploads/" . $_FILES['fileToUpload']['name'];
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$filename);
                if(file_exists($filename) && !empty($filename)&&$filename!="uploads/" ){
                    $query="UPDATE users SET photo_profile = '$filename'
                    WHERE userid ='$userid' LIMIT 1";
                    $Db=new Database();
                    $Db->save($query);
                    $image=$filename;
                   
                 }else{
                  $query="UPDATE users SET photo_profile = 'null'
                  WHERE userid ='$userid' LIMIT 1";
                  $Db=new Database();
                  $Db->save($query);
                  $image=$filename;
                 }
                    header('Location: officialPage.php');

                     } 
                
        }
       
       


?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="uploadPhoto.css">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>
<body>
    <div id="container">
        <h2 >Change your profile Picture.</h2>
       
        <form method="post" enctype="multipart/form-data">
            
        <div  id="cover"> 
    <?php
              if($user_data['photo_profile']=="uploads/"){
                $image="assets/account.png";
              }else{
                $image=$user_data['photo_profile'];
              }

              ?> 
              <label for="file">    
  <i style="  color: white;align-items: center;font-family: 'Fredoka One',cursive;    object-fit: cover;">
  <img   src="<?php echo $image ?>"></i>  </label><br>
    </div >
    

    <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: white;
    opacity: 0.3;
     
    background-color: transparent; background-repeat: no-repeat;
    cursor: pointer; overflow: hidden;">
  <input name="fileToUpload" id="file" type="file">
  
  </span>

<button style="opacity: 1;" id="continue" name="continuee" onclick="continueClick();">Change picture</button>
        </form>
        
    </div>

<style>
  input#file[type="file"]{
        display: none;

     }
     
  


</style>



</body>


</html>
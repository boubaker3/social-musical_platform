<?php
 include_once'connect.php';
 $error="";
if(isset($_POST['shareIt'])){
     if(isset($_FILES['songFile']['name'])&& isset($_FILES['coverFile']['name'])){
        $title=addslashes($_POST['title']);
        $artist=addslashes($_POST['artist']);
        $album=addslashes($_POST['album']);
        $category=addslashes($_POST['category']);
        $description=addslashes($_POST['description']);
        $status=addslashes($_POST['status']);
        $post_id=getPostId();
        $song="postsUploads/" .$_FILES['songFile']['name'];
        $cover="postsUploads/" .$_FILES['coverFile']['name'];
        $postUserId=$_SESSION['userid'];
        move_uploaded_file($_FILES['songFile']['tmp_name'],$song);
        move_uploaded_file($_FILES['coverFile']['tmp_name'],$cover);
        if(!empty($cover)&&!empty($song)&&!empty($title)
        &&!empty($artist)&&!empty($album)&&!empty($category)&&!empty($status)){
            $DB=new Database();
            $query="INSERT INTO posts (title,artist,album,song,category,cover,description,postId,status,userid)
            Values('$title','$artist','$album','$song','$category','$cover','$description','$post_id','$status','$postUserId')";
            $DB->save($query);
            $query="update users set postsNumber=postsNumber+1 where userid='$_SESSION[userid]'";
            $DB->save($query);


        }else{
            $error="something went wrong";

        }
      

    }
}
    function getPostId(){
        $num=rand(4,19);
        $finalUserId="";
         for ($i=0; $i <$num; $i++) { 
          $newNum=rand(0,9);
          $finalUserId .=$newNum;
        }
        return $finalUserId;
      }




?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

</head>
<body>
<div style="margin-left: 60px;">

    <h1>Share on Musiks </h1>
    <a style="font-size: 15px;color: var(--main-color2);"><?php echo $error ?></a>
    <form method="post" enctype="multipart/form-data">
<div>
<input name="title" id="songTitle" placeholder="Song title"><br>
<input name="artist" id="artist" placeholder="Artist"><br>
<input name="album" id="album" placeholder="Which album?"><br>

<p style="color: white;opacity: 0.5;font-size: 15px;margin-top: 10px;
font-family:'Fredoka One',cursive;
margin-left: 10%;">
Import your song here</p>

 
  <input name="songFile" id="file" type="file">
  <label for="file">   <i ><img style="margin-top: 4px;" src="assets/folder-music.png "
   width="32px" height="30px" 
  ></i>
  <a style="font-size: 18px;  color: white;font-family: 'Fredoka One',cursive;">upload song</a>  </label><br>
  
  <p style="color: white;font-size: 15px;margin-top: 20px;
  font-family:'Fredoka One',cursive;
margin-left: 10%;opacity: 0.5;">Which category?</p> 
  <select  id="category" name="category"> 
<option value="Hip hop">Hip hop</option> 
<option value="Rock">Rock</option> 
<option value="Pop">Pop</option> 
<option value="Rhythm and blues">Rhythm and blues</option> 
<option value="Soul music">Soul music</option> 
<option value="Jazz">Jazz</option> 
<option value="Funk">Funk</option> 
<option value="Classical music">Classical music</option> 
<option value="Electronic music">Electronic music</option> 
 </select><br>
<p style="color: white;font-size: 15px;margin-top: 10px;
font-family:'Fredoka One',cursive;
margin-left: 10%;opacity: 0.5;">Import your cover here</p>
            <input name="coverFile" id="cover" placeholder="Song cover" type="file">
            <label for="cover">
            <i><img src="assets/upload-image.png" width="32px" height="30px"></i>
            <a style="color: white;align-items: center;font-family: 'Fredoka One',cursive;font-size: 18px;">upload cover</a>
                
            </label><br>

            <p style="color: white;font-size: 15px;margin-top: 20px;
font-family:'Fredoka One',cursive;
margin-left: 10%;opacity: 0.5;">What's on your mind?</p> 
<input name="status" id="status" placeholder="write a caption..."><br>
<p style="color: white;font-size: 15px;margin-top: 20px;
font-family:'Fredoka One',cursive;
margin-left: 10%;opacity: 0.5;">Lyrics</p> 
 <textarea id="desc" rows="1000" cols="1000" name="description" type="text" placeholder="Optional"></textarea><br>
<button name="shareIt" id="upload">Share it</button>
</div>
</form>
</div>

<style>
    :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
div{
      border-radius: 20px;
   }
    body{
        background-color: var(--main-color);
        overflow-x: hidden;
    }
    h1{
        color: white;
        margin-top: 100px;

        font-family: 'Fredoka One',cursive;
     }
     input:-webkit-autofill,
input:-webkit-autofill:focus {
    transition: background-color 600000s 0s, color 600000s 0s;
}
 input[data-autocompleted] {
  background-color: transparent !important;
}
input:autofill {
  background: var(--main-color);
}
    #songTitle{
        padding: 6px;
    outline-width: 0;
     font-size: 17px;
     margin-top: 20px;
    width: 300px;
    margin-left: 10%;
    font-size: 5px;
    height: 40px;
    color: white;
    border:0;
     font-size: small;
     background-color: #160020ff;
 
    }
    #artist{
        padding: 6px;
    outline-width: 0;
     font-size: 17px;
     margin-top: 20px;
    width: 300px;
    margin-left: 10%;
    font-size: 5px;
    height: 40px;
    color: white;
    border:0;
     font-size: small;
     background-color: #160020ff;
 
    }
    #status{
        padding: 6px;
    outline-width: 0;
     font-size: 17px;
     width: 300px;
    margin-left: 10%;
    font-size: 5px;
    height: 40px;
    color: white;
    border:0;
     font-size: small;
     background-color: #160020ff;
    }
    #album{
        padding: 6px;
    outline-width: 0;
     font-size: 17px;
     width: 300px;
    margin-left: 10%;
    font-size: 5px;
    height: 40px;
    color: white;
    border:0;
     font-size: small;
     background-color: #160020ff;
     margin-top: 20px;

    }
  
    #desc{
        padding-left: 6px;
    outline-width: 0;
     font-size: 17px;
     width: 500px;
    margin-left: 10%;
    font-size: 5px;
    height: 150px;
    color: white;
    border:0;
     font-size: small;
     background-color: #160020ff;
     resize: none;
  
    }
    ::placeholder {  
  color: white;
  opacity: 0.5;  
}
    input#cover[type="file"]{
        display: none;

     }
    input#file[type="file"]{
display: none;    }
     label{
        padding-top: 25px;
       padding-bottom: 10px; 
       padding-left: 10px;
       padding-right: 10px;  
       background-color: #160020ff;
       margin-left: 10%;
    align-items: center; 
    margin-right: 50%;
  
    }
    label:hover{
        transition-duration: 1s;
        box-shadow: var(--main-color2) 0 0 1em;
        background-color: var(--main-color2);
    }
    #upload{
        min-width:  200px;
    min-height:  40px;
    background-color: transparent;
    background-repeat: no-repeat;
    cursor: pointer ;
    border: var(--main-color2) 3px solid;
    overflow: hidden;
     box-shadow: 0 0 0.5em var(--main-color2);
    font-family: 'Fredoka One', cursive;
    color: white;
    border-radius: 20px;
    font-size: 20px;
    margin-top: 2%;
    margin-left: 50%;
    margin-bottom: 2%;
    }
#upload:hover{
    background-color: var(--main-color2);
    transition-duration: 1s;
}
 
::-webkit-scrollbar {
    width: 8px;

   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
    border-radius: 8px;

  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
    border-radius: 8px;
  }
  :root{
    scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
    scrollbar-width: thin !important;
     
  }
  input{
      border-radius: 10px;
      outline-style: none;

  }
 
    select{
        padding: 6px;
    outline-width: 0;
     font-size: 17px;
     width: 200px;
    margin-left: 10%;
    font-size: 5px;
    height: 40px;
    color: white;
      font-size: small;
      background-color: #160020ff;
      border: 1px var(--main-color) solid;
     background-repeat: no-repeat;
     -moz-appearance:none; 
    -webkit-appearance:none;  
    appearance:none;
        }
        select:hover{
        background-color: #160020ff;
        transition-duration: 1s;
    }
   
</style>
</body>

</html>
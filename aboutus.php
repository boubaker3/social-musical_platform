<!Doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="favourites.css"></head>

<body>
<a href="officialPage.php"><img  class="logo"  src="assets/musiksPng.png " style="width: 120px;height: 60px;margin-left: 20px;"></a>

    <div id="abText">
        <p style="font-size: 30px;">About Musiks</p>
    <p>Musiks is a digital platform where you can meet a new friends that are <br>
   interested in music, and share your favorite music with them as they can<br>
   you can follow your friends chat with community and Interact with them, <br>
   as we make sure that you get the best possible user experience with  <br>
   a responsive and great user interface.

 </p>

    </div>
<button onclick="goHome();"> Go back home</button>
 <style>
     :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
body{
    background-color: var(--main-color);
 
}
p{
    margin-top: 1%  ;
font-size: 20px;
color: white;
 font-family: 'Fredoka One', cursive;
}
#abText{
     margin-left: -50%;
    margin-left: 20%;

    padding: 2%;
     margin-top: 1%;
display: block;
}
 
#abText:hover p {
    color: var(--main-color2);
   transition-duration: 2s;
 }
button{
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
    margin-top: 10%;

    text-shadow: 0 0 0.5em var(--main-color2) ;
     float: right;
      position: relative;
}
button:hover{

     background-color: var(--main-color2);
     box-shadow: 0 0 1em var(--main-color2);
     transition-duration: 500ms;
    }
 </style>
 <script>
function goHome(){
    window.location.replace('officialPage.php');
}
 </script>
</body>


</html>

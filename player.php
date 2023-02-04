<?php
include_once'userData.php';
 if(isset($_GET['id'])&&is_numeric($_GET['id'])){
 $user=new User();
$ROW=$user->getPostid($_GET['id']);
 if(!$ROW){
    if(headers_sent()) {
        echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
       
     
       }else{
         header('Location: officialPage.php?section=notFound');
       }
 }
 }else{
    if(headers_sent()) {
        echo '<script type="text/javascript">window.location.href="officialPage.php?section=notFound"</script>';
       
     
       }else{
         header('Location: officialPage.php?section=notFound');
       }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>   
     <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    
 </head>
<body >
    

             <div class="w-sm-25 w-100" id="dialogLyrics"  ><button id="goBack" onclick="goBack()">Go back</button> 
<p><?php echo $ROW['description']?></p>
     
 
  
 </div >

    <div   style="margin-top:75px;" id="parent">

   <button class="d-none d-md-block"  onclick="lyricsBtn()" id="lyricsBtn">Lyrics</button>
 
   <div class="d-none d-lg-block  me-md-3"   id="rightChild">
    <img id="forward" src="assets/forward.png"  type="button" onclick="forwardBtn() "width="35px" height="30px"><br> 
    <button  id="play" src="assets/pause.png"   type="button"
     onclick="playBtn()" width="40px" height="40px">
    <i><img id="playImg" src="assets/play.png" width="40px" height="40px"></i>
    </button><br>
    <img id="rewind" src="assets/rewind.png" type="button" onclick="rewindBtn()"width="35px" height="30px"> 

    </div>
   
    <div id="leftChild" >
        <div class="row">

    
       
        <div class="col-md-6">
    <img  id="visualizer" width="300px" height="350px"   src="assets/visualizer.gif"> 

         <img  class="img-fluid" style="object-fit: cover;" id="cover" width="300px" height="300px" src="<?php echo $ROW['cover'] ?>">
         <div style="position: absolute" class="d-inline-block d-lg-none ">

         <img style=" position: absolute;margin-left: 10px;" 
         id="forward" src="assets/forward.png"  
         type="button" onclick="forwardBtn() "width="30px" height="25px"><br>
         <button 
           id="play" src="assets/pause.png"   type="button"
     onclick="playBtn()" width="28px" height="28px">
    <i><img id="playImgS" src="assets/play.png" width="28px" height="28px"></i>
    </button><br>
    
         <img style="position: absolute;margin-left: 10px;"  id="rewind" src="assets/rewind.png" type="button" onclick="rewindBtn()"width="30px" height="25px"> 
         </div>

</div>
        <div class="col-12 col-lg-6 mt-3 ">
             <h2 class="h1 d-inline-block ms-3" ><?php echo $ROW['title'] ?></h2><br>
    <h2 class="h5 d-inline-block mt-3" ><?php echo $ROW['artist'] ?></h2><br>
    <h2 class="h5 d-inline-block"  ><?php echo $ROW['album'] ?></h2><br>
    <h2 class="h5 d-inline-block" ><?php echo $ROW['category'] ?></h2><br>
  
        </div>
     
   



     </div>
      <div   id="bottomChild" class="col-12  d-block mt-md-3">
         <a id="currenttime" style="color: white;font-size: 10px;  
"></a>
    <input  id="seekbar" type="range" min="0" max="100"  value="0" >
<a id="duration" style="color: white;font-size: 10px;position: absolute;margin-top: 5px;margin-left: 5px;"></a>
<button id="muteBtn" 
style="float: right;width:30px; height:20px;background-color: transparent;border: 0; " onclick="audioMute()">
<i><img width="25px" height="20px"  src="assets/volume.png"></i></button>  
     </div>
     </div>

    </div>

    <audio  id="audio" src="<?php echo $ROW['song'] ?>" autoplay loop=1   ></audio>
   
    <style>
       :root {
    --main-color:#160020ff;
    --main-color2:rgb(170, 0, 142);
}
 
input[type="range"]{
    width: 300px;
-webkit-appearance: none;
outline: none;
height: 4px;
background:rgb(15, 0, 22);
opacity: 0.5;
border-radius: 5px;


}
input[type="range"]::-webkit-slider-thumb{
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    background: var(--main-color2);
    border-radius: 50%;
    

 }
 input[type="range"]::-moz-range-thumb{
    -webkit-appearance: none;
    background: var(--main-color2);
    border-radius: 50%;
    border: none;
     

 }
body{
    overflow: hidden;
    padding-right: 50px;
 }
img#cover{
    border-radius: 20px;
    margin-top: 10px;

  }
 img#visualizer{
    border-radius: 20px;
    position: absolute;
    margin-top:115px;
 }
#rightChild{
    float: right;
 }
h2{
     
    
     color: white;
     font-family: 'Fredoka One',cursive;
 

}
#parent{
    width: 800px;
    padding: 20px;
    border-radius: 20px;
     background-color: rgba(33, 0, 48, 0.267);
}
audio{
           display: none;
       }
button#play{
    background-color: transparent;
    background-repeat: no-repeat;
    cursor: pointer;
    overflow: hidden;
    margin-top: 80px;
    margin-right: 50px;
    border: var(--main-color2) 3px solid;
    padding: 20px;
    box-shadow: 0 0 1em var(--main-color2);  
   
    border-radius: 100%;   

}
button#lyricsBtn{
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
button#goBack{
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
button#goBack:hover{
    background-color: var(--main-color2);
    box-shadow: 0 0 1em var(--main-color2);
    transition-duration: 0.5s;
}
button#lyricsBtn:hover{
    background-color: var(--main-color2);
    box-shadow: 0 0 1em var(--main-color2);
    transition-duration: 0.5s;
}
button#play:hover{
    background-color: var(--main-color2);
    transition-duration: 1s;
     

}
img#rewind{
    margin-top: 80px;
    margin-left: 50px;

}
img#forward{
    margin-left: 50px;

}
#dialogLyrics{
    max-height: 400px;
    overflow-y: auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       width: 800px;
       margin-top: 75px;
      float: left;
      color: white;
      background-color: rgba(33, 0, 48, 0.267);
      border: 0;
      box-shadow: 0 0 20px var(--main-color);
      border-radius: 20px;
      position: relative;
       padding: 20px;
 
}
 
 
::-webkit-scrollbar {
    width: 10px;
 
   }
  
   ::-webkit-scrollbar-track {
    background: rgba(170, 0, 142, 0.219);
    border-radius: 8px;

  }
  
   ::-webkit-scrollbar-thumb {
    background: rgb(170, 0, 142);
  background-clip: padding-box;  
  border-radius: 8px;

  }
  :root{
    
    scrollbar-color: var(--main-color2) rgba(170, 0, 142, 0.219) !important;
    scrollbar-width: thin !important;
     
  }
 
 
       </style>
    <script>

var audio=document.getElementById('audio');
var vis=document.getElementById('visualizer');
var seekbar=document.getElementById('seekbar');
var playImg=document.getElementById('playImg');
var playImgS=document.getElementById('playImgS');
var duration =document.getElementById('duration');
var currenttime =document.getElementById('currenttime');
var parentDiv=document.getElementById('parent');
var dialogLyrics=document.getElementById("dialogLyrics");
var muteBtn=document.getElementById("muteBtn");

dialogLyrics.style.display='none'

  function lyricsBtn(){
    dialogLyrics.style.display='block'
    dialogLyrics.style.marginLeft='0px'
    parentDiv.style.opacity='0'
    parentDiv.style.marginTop='2000px'
    parentDiv.style.transitionDuration='1s'



 }
 function goBack(){
     dialogLyrics.style.display='none';
     parentDiv.style.marginTop=' 75px'
     parentDiv.style.opacity='1'

 }
vis.style.display='block';
playImg.src="assets/pause.png";
playImgS.src="assets/pause.png";
seekbar.value = 0;
       
        
        function seekAudio() {
          audio.currentTime = seekbar.value;
          
        }

        function updateUI() {
          var lastBuffered = audio.buffered.end(audio.buffered.length-1);
          seekbar.min = audio.startTime;
          seekbar.max = lastBuffered;
          seekbar.value = audio.currentTime;
          var min=parseInt(audio.duration/60);
          var sec=parseInt(audio.duration%60);
          if(sec<10){
            duration.innerText=min+":"+"0"+sec;

          }else{
            duration.innerText=min+":"+sec;

          }
          var totalout="";
          var totalNew="";
          var minC=parseInt( seekbar.value/60);
          var secC=parseInt( seekbar.value%60);
          totalout=minC+":"+secC;
          totalNew=minC+":"+"0"+secC;
          if( seekbar.value<10){
            currenttime.innerText=totalNew;
           }
           else{
            currenttime.innerText=totalout;
          }
           



        }
        seekbar.onchange = seekAudio;
        audio.ontimeupdate = updateUI;
function playBtn(){
    if(audio.paused){
        audio.play();
        playImg.src="assets/pause.png";
        playImgS.src="assets/pause.png";
        vis.style.display='block';
       
    }
    else{
        audio.pause();
        playImg.src="assets/play.png";
        playImgS.src="assets/play.png";
        vis.style.display='none';

    }
}
function forwardBtn(){
    audio.currentTime +=10;
}
function rewindBtn(){
    audio.currentTime -=10;
}
Audio.muted=false;
 function audioMute(){
    if(audio.muted){
        audio.muted=0;
        muteBtn.style.backgroundColor="transparent"

    }
    else{
        audio.muted=1;
        muteBtn.style.backgroundColor="rgb(15, 0, 22)"
        muteBtn.style.paddingRight="30px"
        muteBtn.style.paddingtop="20px"
        muteBtn.style.paddingBottom="20px"
        muteBtn.style.borderRadius="20px"

    }
}


 

    </script>
</body>
 
</html>
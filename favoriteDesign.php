<div class="d-block d-md-inline-block" style="display: inline-block;margin-left: 20px;">

<div style="width: 200px;"> 
 <a href="officialPage.php?id=<?php echo $favoritesRow['postId'] ?>&section=player">
<img id="cover" src="<?php echo $favoritesRow['cover'] ?>" >
</a>
   <a href="officialPage.php?section=deleteFavorite&id=<?php echo $favoritesRow['postId'] ?>&type=favorite">
  <button   id="more" style="position: absolute;margin-left: 150px;
  margin-top: 5px; ">
  <img  src="assets/delete.png" width="30px" height="32px" ></a>

  </button>
</div>

<h3 class="d-inline-block d-md-block" style="color: white;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
text-align: center;font-size: 15px;margin-top:210px;"><?php echo $favoritesRow['title'] ?></h3>

</div>



<style>
img#cover{
width: 200px;
height: 200px;
 border-radius: 5px;
 position: absolute;
 }

img#cover:hover{
opacity: 0.5;

transition-duration: 1s;

}
 
#more:hover{
   opacity: 0.2;
 
  transition-duration: 1s;
  border-radius: 50%;
} 
button{
    background-color: transparent;
    border: 0;
}
</style>
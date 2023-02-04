<div class="d-block d-md-inline-block" style="display: inline-block; margin: 10px;  text-align: center;width: 200px;height: 300px;background-color: rgba(33, 0, 48, 0.267);" >

<a style="text-decoration: none;" href="officialPage.php?id=<?php echo $FRIENDS_ROW['userid']?>&section=profile">
<img style=" border-radius: 5px;    object-fit: cover;
" 
src="<?php echo $FRIENDS_ROW['photo_profile']=="null"?"assets/account.png": $FRIENDS_ROW['photo_profile'] ?>" width="200px" height="200px"></a><br>
<a href="officialPage.php?id=<?php echo $FRIENDS_ROW['userid']?>&section=profile"
 style="font-size: 20px;color: white; 
font-family: 'Fredoka One',cursive;text-decoration: none;
" ><?php echo $FRIENDS_ROW['username'] ?></a> <br>
 <?php
   include_once'userData.php';
  $id=$_SESSION['userid'];
  $user=new User();
  $res=$user->getFollowingPosts($id);
  $img="assets/follow.png";
   if(is_array($res)){
     $ids=array_column($res,"userid");
     if(in_array($FRIENDS_ROW['userid'],$ids)){
         $img="assets/followed.png";
    }
    else{
         $img="assets/follow.png";
    }
  }
  
     
 
 ?>
<div style="border-radius: 5px;">
<a  onclick="followajax(event)" href="like.php?type=profile&id=<?php echo $FRIENDS_ROW['userid'] ?>">
<img  src="<?php echo $img ?>" width="150px" height="40px" style="border-radius: 10px;"> </img></a>


</div>

</div>
</a>  
<style>
img:hover{
opacity: 0.5;
transition-duration: 0.5s;
}
button:hover{
opacity: 0.5;
transition-duration: 0.5s;
}

</style>
<script type="text/javascript">
function ajaxEvent(data,element){
    var ajax=new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
        if(ajax.readyState==4 && ajax.status==200){
            response(ajax.responseText,element);
        }
    });
  
    data=JSON.stringify(data);
    ajax.open("post","ajax.php",true);
    ajax.send(data);
}
function followajax(e){
    e.preventDefault();
    var link=e.currentTarget.href;
    var data={};
    data.link=link;
    data.action="follow";
     ajaxEvent(data,e.currentTarget);
}
function response(result,element){
   
    element.innerHTML=result;
  }


</script>
 
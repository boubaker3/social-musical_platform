<?php
class Favorites{
function addFavorites($userid,$postId){
    $DB=new Database();
 $sql="select favorites from favorites where userid='$userid'";
$res=$DB->retrieve($sql);
if($res){
    $favorites=json_decode($res[0]['favorites'],true);
    $favoritesClmns=array_column($favorites,'postid');
    if(!in_array($postId,$favoritesClmns)){
        $arr["postid"]=$postId;
        $favorites[]=$arr;
        $favoritesString=json_encode($favorites);
        $sql="update favorites set favorites ='$favoritesString' where userid='$userid' limit 1";
        $DB->save($sql);
    }else{
        $favoritesString=json_encode($favorites);
        $sql="update favorites set favorites ='$favoritesString' where userid='$userid' limit 1";
        $DB->save($sql);
    }

}else{
    $arr['postid']=$postId;
    $arr2[]=$arr;
    $favoritesString=json_encode($arr2);
    $sql="insert into favorites (userid,favorites) values ('$userid','$favoritesString')";
    $DB->save($sql);
}
}
}
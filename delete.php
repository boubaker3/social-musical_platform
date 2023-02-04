<?php
include_once 'connect.php';
 $DB=new Database();
 session_start();

  if($_GET['type']=="favorite" && isset($_GET['id'])&&is_numeric($_GET['id'])&& $_GET['order']=="delete" ){
      $query="select favorites from favorites where userid ='$_SESSION[userid]' limit 1";
      $res=$DB->retrieve($query);
      if(is_array($res)){
          $favs=json_decode($res[0]['favorites'],true);
          $ids=array_column($favs,"postid");
      $key=array_search($_GET['id'],$ids );
      if($favs[$key]==end($favs)){
          unset($favs[$key]);
      }     
      else{
          $last=end($favs);
          list($last,$favs[$key]) = array($favs[$key],$last);
          unset($favs[count($favs) - 1]);
      }
      $favString=json_encode($favs);
      $sql="update favorites set favorites='$favString' where userid='$_SESSION[userid]' limit 1";
      $DB->save($sql);
      }
      header('Location: officialPage.php?section=favorite');

   }else if($_GET['order']=="cancel"){
    header('Location: officialPage.php?section=favorite');

   }

 
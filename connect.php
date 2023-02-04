<?php
class Database{
private $host="localhost";
private $username="root";
private $password="";
private $db="Musiksdb";
function connect(){
    $conn=mysqli_connect($this->host,$this->username,$this->password,$this->db);
   return $conn; 
}
function save($query){
    $conn=$this->connect();
    $res= mysqli_query($conn,$query);
if(!$res){
    return false;
}
else{
    return true;
}
}
function retrieve($query){
    $conn=$this->connect();
   $res= mysqli_query($conn,$query);
if($res==false){
    return false;
}else{
    $data=false;
    while($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
return $data;

}
}


}
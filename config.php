<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="ta_web";

try{
  $db = new PDO("mysqli:host=$db_host;dbname=$db_name",$db_user,$db_pass);
} catch(PDOException $e){
  die("Terjadi Masalah: ".$e->getMessage());
}
 ?>

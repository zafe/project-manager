<?php 
include 'config.php';
Session::start();
if(Session::isValid()){
    Session::destroy();    
}
header("location:index.php");
exit();
?>
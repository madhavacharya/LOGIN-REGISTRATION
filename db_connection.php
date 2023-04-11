<?php
$server_name="localhost";
$user="root";
$password="";
$db_name="db_php";

//
$con=new mysqli($server_name,$user,$password,$db_name);

//connection check
if(!$con){
    die('failed to connect to database');
}
else{
    // echo'database connected';
    //start the session
session_start();
}
?>  
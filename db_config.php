<?php
$host='localhost';
$user_name='root';
$password='';
$database='test2';
$conn=new mysqli($host,$user_name,$password,$database);
if($conn->connect_error){
	die("Connection Failed ".$conn->connect_error);
}	
?>
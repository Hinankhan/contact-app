<?php
include 'connect.php';


if( empty($_GET['Name']) || empty($_GET['email']))
{
    
    die();
}

$form_name= $_GET['Name'];
$form_email=$_GET['email'];

$sql= "INSERT INTO users(username,email) VALUES('$form_name', '$form_email')";
$con->exec($sql);
header("location:index.php");
echo "insertion sucessfull";
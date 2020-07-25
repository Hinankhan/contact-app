<?php
include 'connect.php';
//$form_name=$_GET['Name'];
//$form_email=$_GET['email'];
$id=$_GET['id'];
$con->setAttribute(PDO :: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql= ("DELETE FROM users WHERE id=?");
$stmt=$con->prepare($sql);
$stmt->execute([ $id]);
//echo "Record deleted sucessfully";
header("Location:index.php");
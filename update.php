<?php
include 'connect.php';
$form_name= $_GET['Name'];
$form_email=$_GET['email'];
$id= $_GET['id'];
$con->setAttribute(PDO :: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql =("UPDATE  users  SET username = ? , email= ? WHERE id = ?" );
$stmt=$con->prepare($sql);
$stmt->execute([$form_name , $form_email , $id]);
echo $stmt->rowCount();
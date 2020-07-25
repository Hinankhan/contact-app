<?php
$servername="localhost";
$username="root";
$password="";


try{

    $con = new PDO("mysql:host=$servername;dbname=forms",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection sucessfull.<br>";
}
catch(PDOException $e){
echo "connection failed :"  .$e->getmessage();

}
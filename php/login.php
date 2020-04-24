<?php
session_start();
    include'../connection/db_inc_user.php'; 
$username=$_POST["username"];
$password=$_POST["password"];
$bulk=new MongoDB\Driver\BulkWrite;

$filter=[
    'username'=>$username,
    'password'=>$password
];
$query=new MongoDB\Driver\Query($filter);
    try{
    $result=$manager->executeQuery($dbname,$query);
    $row=$result->toArray();
    $user=$row[0]->username;
    echo $user;
    $_SESSION['username']=$user;
    header("Location:../index.php");
    } catch (MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered:.$e");
    }   
?>
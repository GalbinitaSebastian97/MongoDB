<?php
    include'../connection/db_inc_article.php'; 
$bulk=new MongoDB\Driver\BulkWrite;

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$password=$_POST["password"];

$user=[
    '_id'=> new MongoDB\BSON\ObjectId,
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'username'=>$username,
    'password'=>$password
];
    try{
    $bulk->insert($user);
    $result=$manager->executeBulkWrite($dbname,$bulk);
    echo"Location:../userlist.php";
    } catch (MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered:.$e");
    }   
?>
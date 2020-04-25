<?php
include'connection/db_inc_article.php'; 
$bulk=new MongoDB\Driver\bulkWrite;

$articlename=$_POST["articlename"];
$articletext=$_POST["articletext"];
if(isset($_POST['uploadarticle'])){ 
    $target="./images/".md5(uniqid(time())).basename($_FILES['imagine']['name']);
$article=array(
    
    '_id'=> new MongoDB\BSON\ObjectId,
    'articlename'=>$articlename,
    'articletext'=>$articletext,
    'imagine'=>$target
);
    $bulk->insert($article);
}
    $result=$manager->executeBulkWrite($dbname,$bulk);
    if(move_uploaded_file($_FILES['imagine']['tmp_name'], $target)) {header('location:index.php');}
    else {echo"vai,vai";}
?>
<?php
require_once 'connection/db_inc_article.php';
$bulk = new MongoDB\Driver\BulkWrite;

if(!isset($_POST["submit"])){
$id = new \MongoDB\BSON\ObjectId($_GET['id']);
$filter = ['_id' => $id];
$query = new MongoDB\Driver\Query($filter);          
$article = $manager->executeQuery("phpbasics.article", $query);
$doc = current($article->toArray());
}else{
    $target="./images/".md5(uniqid(time())).basename($_FILES['imagine']['name']);
 $data=[
        'articlename'=>$_POST['articlename'],
        'articletext'=>$_POST['articletext'],
        'imagine'=>$target,
    ];
$id = new \MongoDB\BSON\ObjectId($_POST['id']);
$filter = ['_id' => $id];
    
$update=['$set'=>$data];

 $bulk->update($filter, $update);
 $manager->executeBulkWrite('phpbasics.article',$bulk);
 if(move_uploaded_file($_FILES['imagine']['tmp_name'],$target)){
       header('location:index.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/add-image.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
        <body>
<?php include'connection/header.php'?>
<div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-7 mt-5">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                      <h2 class="text-center display-4">Edit Article</h2>
                            <div class="form-group">
                              <label for="articlename">Article Name</label>
                              <input type="text" class="form-control" id="articlename" name="articlename" placeholder="Enter the Title for Your Article" values="<?php echo $_GET["articlename"];?>">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                            <div class="form-group">
                              <label for="articletext">Add an Overview</label>
                              <textarea class="form-control" name="articletext" rows="3" required values="<?php echo $_GET["articletext"];?>"></textarea>
                            </div>    
                            <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                            <div class="image-upload-wrap">
                              <input class="file-upload-input" type='file' onchange="readURL(this);" name="imagine" values="<?php echo $_GET["imagine"];?>">
                              <div class="drag-text">
                                <h3>Drag and drop an Image</h3>
                              </div>
                            </div>
                            <div class="file-upload-content">
                              <img class="file-upload-image" src="#" />
                              <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                              </div>
                            </div>
                            <br>
                                  <input type="submit" value="ADD ARTICLE" name="submit" class="file-upload-btn">
                    </form>
                </div>
            </div>
        </div>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});
    
    </script>        
        </body>
</htm
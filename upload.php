<?php
session_start();
include "auth.inc.php";
include "db_config.php";

$username = $_SESSION['username'];

$target_dir = "uploads/";
$hidden_dir_target = "hidden_upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 

$target_file = $target_dir . "image_" . date('His', time()) . "." . pathinfo($target_file,PATHINFO_EXTENSION);
echo $target_file . "<br><br>";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$query = mysql_query("SELECT usr_id FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$query = mysql_query("INSERT INTO images(url, usr_id) VALUES('$target_file', '$row[usr_id]')") 
		or die("Error while uploading image to server");
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header("Refresh: 3; url=upload_form.php");
		die();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
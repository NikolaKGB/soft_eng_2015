<?php 
session_start();
include_once 'auth.inc.php';
?>

<!DOCTYPE html>
<html>
<body>

<span><?php echo "Hello, <b>" . $_SESSION["username"] . "</b>.<br>"; ?></span>
<a href="logout.php">Logout</a>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
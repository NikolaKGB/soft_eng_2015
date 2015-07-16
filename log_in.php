<?php
session_start();
include "db_config.php";

if(isset ($_POST["submitlog"])){
	$username_submitted = $_POST["username"];
	$password_submitted = $_POST["password"];
	$query = mysql_query("select usr_id from users where username = '$username_submitted' and password = '$password_submitted'")
		or die(mysql_error());
	if (mysql_num_rows($query) == 1) {
		$_SESSION["logged"] = 1;
		$_SESSION["username"] = $username_submitted;
		header("Location: upload_form.php");
		die();
	} else {
		$_SESSION["logged"] = 0;
		die("Wrong credientials provided");
	}
	// $row = mysql_fetch_array($query);
}

?>
<!doctype html>
<html>

<body>



<form action = "#" method = "POST">
<input type = "text" name = "username"><br>
<input type = "password" name = "password"><br>
<input type = "submit" name = "submitlog">

</form>
</body>
</html>
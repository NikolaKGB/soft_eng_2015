<?php 
	session_start();
	include_once "db_config.php";
	
	if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
		header("Location: upload_form.php");
		die();
	}
	
	if (isset($_POST["submitlog"])) {
		$username_new = $_POST["username"];
		$password_new = $_POST["password"];
		$id = rand(0,9999);
		$query = mysql_query("INSERT INTO users (username, password, usr_id) VALUES('$username_new', '$password_new', '$id')")
			or die(mysql_error());
		echo "You have registered succsessfully.";
		header("Refresh: 3, url=log_in.php");
		die();
	}	

?>
<!doctype html>
<html>

<body>



<form action = "#" method = "POST">
<input type = "text" name = "username"><br>
<input type = "password" name = "password"><br>
<input type = "submit" name = "submitlog" value ="Register">

</form>
</body>
</html>
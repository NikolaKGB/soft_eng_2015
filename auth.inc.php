<?php 
	if (!$_SESSION["logged"]) {
		header("Location: log_in.php");
		die();
	}
?>
<?php 
	session_start();
	// include_once 'auth.inc.php';
	include_once "db_config.php";
	
	$connect = mysql_connect("localhost", "root", "myxampppass") 
		or die("Unable to connect to database");
	mysql_select_db("sexbox");
	
	// $_SESSION["logged"] = 0;
	
	if(isset($_SESSION["logged"]) && $_SESSION["logged"] == 1) {
		// logged in 
		header("Location: upload_form.php");
		die();
	} else {
	(!isset($counter)) ? $counter = 0 : $counter = 0;
?>
<!doctype html>
<html>
<head>
	<title>SeeBox</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class='container'>
	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span style="color: #FF0066;">SeeBox</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3" style="float: right;">
          <a href="log_in.php" class="btn btn-success navbar-btn">Upload</a>
		  <a href="log_in.php" class="btn btn-danger navbar-btn">Sign in</a>
        </div>
      </div>
    </nav>
	</div>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 500px;">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner" role="listbox">
			<?php
				$get_images = mysql_query("SELECT url FROM images");
				$count_of_results = mysql_num_rows($get_images);
				// $row = mysql_fetch_array($get_images);
				while ($row = mysql_fetch_array($get_images)) { 
					$counter++;
					?>
					<div class="item<?php if ($counter == 1) echo " active"; ?>">
					  <img class="first-slide" src="<?php echo $row["url"]; ?>" alt="First slide" style="height: 500px;">
					  <div class="container">
						<div class="carousel-caption">
						  <h2>If you want to upload images, you have to be <a href="register.php">registered</a>.</h2>
						</div>
					  </div>
					</div> <?php
				}
			?>
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</body>
</html>
<?php 
	}	
?>
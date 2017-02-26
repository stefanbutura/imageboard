<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Adaugare Poza</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                    <li >
                        <a href="acasa.php">Acasa</a>
                    </li>
                    <li class="active">
                        <a href="adaugare_poza.php">Adaugare poza</a>
                    </li>
                    <li>
                        <a href="#">?</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li><a>
						<?php
							session_start();
							$username=$_SESSION['username'];
							echo "Logat ca"." $username";
						?></a>
					</li>
                    <li>
                        <a href="logout.php">Iesire</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Content -->
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Adaugare poza
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-6 portfolio-item">
				<?php

$username=$_SESSION['username'];
$titlu = $_POST['pic_title'];
require_once("dbconnect.php");

$target_dir = "uploads/";
$target_dir = $target_dir.$username."/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$poza=$target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $err="Poza exista deja";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
     $err="Fisier prea mare";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $err="Fisierul nu este o poza";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
     echo '<h3><font color=#337AB7>Eroare</font></h3>'. $err.' <br>
							<a href="adaugare_poza.php">Adaugare poza noua</a> <br>
							<a href="acasa.php">Acasa</a>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo '<h3><font color=#337AB7>Poza adaugata cu succes</font></h3>
							<a href="adaugare_poza.php">Adaugare poza noua</a> <br>
							<a href="acasa.php">Acasa</a>';
		$query = "INSERT INTO poze (titlu, adresa, username, data) VALUES ('$titlu','$poza','$username',now())";
		$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
    } else {
      echo '<h3><font color=#337AB7>Eroare</font></h3>
							<a href="adaugare_poza.php">Adaugare poza noua</a> <br>
							<a href="acasa.php">Acasa</a>';
    }
}
?>
            </div>
        </div>
        <!-- /.row -->

        
        

    </div>
    <!-- /.container -->
	
	
    <footer>
        <div class="copyright">
        	<div class="container">
        		<p>Copyright &copy; Butura Stefan</p>
        	</div>
        </div>
	</footer>

	
   

</body>

</html>


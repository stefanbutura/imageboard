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
					require_once("dbconnect.php");
					$username = $_SESSION['username'];
					$poza = str_replace("https://", "http://", $_POST['pic_url']);
					
					function checkRemoteFile($url)
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$url);
						// don't download content
						curl_setopt($ch, CURLOPT_NOBODY, 1);
						curl_setopt($ch, CURLOPT_FAILONERROR, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						if(curl_exec($ch)!==FALSE)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					$x=checkRemoteFile($poza);

					if ($x) {
						$titlu = $_POST['pic_title'];
						$query = "INSERT INTO poze (titlu, adresa, username, data) VALUES ('$titlu','$poza','$username',now())";
						$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
						if($result)
							echo '<h3><font color=#337AB7>Poza adaugata cu succes</font></h3>
							<a href="adaugare_poza.php">Adaugare poza noua</a> <br>
							<a href="acasa.php">Acasa</a>';
						else echo 'Eroare';
					}
					else echo '<h3><font color=#337AB7>Adresa poza invalida</font></h3>
							<a href="adaugare_poza.php">Adaugare poza noua</a> <br>
							<a href="acasa.php">Acasa</a>';
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

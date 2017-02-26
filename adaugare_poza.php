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
				<h3>
					<font color=#337AB7>Introduceti datele pozei dumneavoastra</font><br><br>
                </h3>
				<form name="add_link" action="adaugare_poza_bd.php" method="post">
					Upload de la adresa:
					<input type="text" name="pic_title" size="70" placeholder="Titlul pozei"><br><br>
					<input type="text" name="pic_url" size="70" placeholder="exemplu: http://www.poze.com/a/poza.jpg"><br><br>
					<input type="submit" value="Trimitere">
				</form>	
				<br><br>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					Upload din computer:
					<input type="text" name="pic_title" size="70" placeholder="Titlul pozei"><br><br>
					<input type="file" name="fileToUpload" id="fileToUpload"><br>
					<input type="submit" value="Trimitere" name="submit">
				</form>
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

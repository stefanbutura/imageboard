<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Comentarii</title>

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
                    <li>
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
                <h1 class="page-header">Comentarii
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
		
        <div class="row">
            <div class="col-md-5 portfolio-item">
			<?php
			
			require_once("dbconnect.php");
			$IDPoza=$_GET['comment'];
			$username = $_SESSION['username'];
			$query = "SELECT u.Nume, u.Prenume, c.Comentariu, c.Data FROM utilizatori u, comentarii c WHERE c.IDPoza='$IDPoza' and c.username=u.username ORDER BY c.data DESC";
			$result = mysqli_query($db, $query) or die ( mysqli_error($db) );	
			
			$query_poza = "SELECT Adresa, Titlu FROM poze WHERE IDPoza='$IDPoza'";
			$result_poza = mysqli_query($db, $query_poza) or die ( mysqli_error($db) );
			$row_poza = mysqli_fetch_array($result_poza);
			echo '
				<h3>
					<font color=#337AB7>'."$row_poza[1]".'</font><br><br>
                </h3>
				<img src='."{$row_poza[0]}".' width="400" height="300">
				<br><br>';
			while($row = mysqli_fetch_array($result))
				echo "<b>$row[0]".' '."$row[1]".'</b>: '."$row[2]".'<br><font size=2	>'."$row[3]".'</font><br><br>';
				echo "</div><br><br><br><br><div class='col-md-5 portfolio-item'>
				<form name='add_comment' action='adaugare_comentariu_bd.php' method='post'>
					<textarea name='comment_text' cols='70' rows='5' id='textarea'></textarea><br><br>
					<button type='submit' value={$IDPoza} name='commentz'>Adauga comentariu</button>
				</form>	
				";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Acasa</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
			.myButton {
	margin-top:2px	;
	background-color:#3379b7;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #124d77;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	width:90px;
	height:24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #154682;
}
.myButton:hover {
	background-color:#0061a7;
}
.myButton:active {
	position:relative;
	top:1px;
}

.myButton2 {
	margin-top:2px	;
	background-color:#c62d1f;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	width:90px;
	height:24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}
.myButton2:hover {
	background-color:#f24437;
}
.myButton2:active {
	position:relative;
	top:1px;
}








		tab1 { padding-left: 4em; }
		tab2 { padding-left: 8em; }
		tab3 { padding-left: 12em; }
		tab4 { padding-left: 16em; }
		tab5 { padding-left: 20em; }
		tab6 { padding-left: 24em; }
		tab7 { padding-left: 28em; }
		tab8 { padding-left: 32em; }
		tab9 { padding-left: 36em; }
		tab10 { padding-left: 40em; }
		tab11 { padding-left: 44em; }
		tab12 { padding-left: 48em; }
		tab13 { padding-left: 52em; }
		tab14 { padding-left: 56em; }
		tab15 { padding-left: 60em; }
		tab16 { padding-left: 64em; }
	</style>
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
                    <li class="active">
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
							if (!isset($_SESSION['username']))
							{
								header('Location: index.php');
							}
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
                <h1 class="page-header">Vizualizare poze
                </h1>
            </div>
        </div>
        <!-- /.row -->
		<?php
			require_once("dbconnect.php");
			
			$query= "SELECT poze.IDPoza, titlu,username, adresa, COALESCE(A.NR,0) as NR, data FROM poze LEFT JOIN (SELECT IDPoza, COUNT(*) as NR FROM likeuripoze GROUP BY IDPoza) as A on poze.IDPoza = A.IDPoza ORDER BY NR desc, data desc";
			$username = $_SESSION['username'];
			
			$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
			
			
			
			
			
			while($row = mysqli_fetch_array($result)){
				$query_nume= "SELECT Nume, Prenume FROM utilizatori WHERE username='$row[2]' ";
				$result_nume=mysqli_query($db, $query_nume) or die ( mysqli_error($db) );
				$row_nume = mysqli_fetch_array($result_nume);
				$nume=$row_nume[0];
				$prenume=$row_nume[1];
				echo '
					<!-- Projects Row -->
					<div class="row">
						<div class="col-md-5 portfolio-item">
							<h3> <font color=#337AB7>
								'."{$row[1]}".'
							</h3> </font>
							'."Likeuri: $row[4]".'<br> '."{$nume} {$prenume} <tab3>  &nbsp{$row[5]}".'<br><img src='."{$row[3]}".' width="400" height="300"><br>
						</div>
						<div class="col-md-5 portfolio-item">
							<br><br><br><br><br>';
					$idpoza="$row[0]";
					$userpoza="$row[3]";
					$query_dislike = "SELECT * FROM likeuripoze WHERE username='$username' AND IDPoza='$idpoza'";
					$result_dislike = mysqli_query($db, $query_dislike) or die ( mysqli_error($db) );
					$count_dislike = mysqli_num_rows($result_dislike);
							
					if(!$count_dislike){
						
						echo '<form method="POST" action="like.php">';
						echo "<button type='submit' value='{$idpoza}' name='Like' class=myButton> Like </button>";
						echo '</form>';
					}
					else{
						echo '<form method="POST" action="unlike.php">';
						echo "<button type='submit' value='{$idpoza}' name='Unlike' class=myButton2> Unlike </button>";
						echo '</form>';
					}
					echo "
						<form name=comment action=comentarii.php method=GET>
						<button type=submit name=comment value={$idpoza} class=myButton> Comentarii </button>
						</form> 
						";
					if($row['username'] == $username || $username=="admin"){
						echo "
							<form name=delete_pic action=stergere_poza.php method=post>
							<button type=submit name=Delete value={$idpoza} class=myButton2> Stergere </button>
							</form> 
							";
					}
				echo '</div>
					</div>
					<!-- /.row -->
				';
			}
		?>
        

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

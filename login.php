<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Bacefook</title>

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
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">Login</a>
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
                <h1 class="page-header">Login
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-6 portfolio-item">
				<?php
					session_start();
					require_once("dbconnect.php");
					$username = $_POST['login_username'];
					$password = $_POST['login_password'];
					$query = "SELECT * FROM utilizatori WHERE username = '$username' AND password= '$password'";
					$result = mysqli_query($db, $query) or die (  mysqli_error($db) );
					$count = mysqli_num_rows($result);
					if($count==0){
						echo "<h3><font color=#337AB7>Date incorecte</font></h3>";
						echo '
						<form name="login_form" action="login.php" method="post">
							<table width="100%" border="0" cellpadding="0" cellspacing="2">
								<tr>
									<td width="40%">Username</td>
									<td><input type="text" name="login_username" id="login_username" /></td>
								</tr>
								<tr>
									<td>Parola</td>
									<td><input type="password" name="login_password" id="login_password" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" name="login_btn" value="Login" /></td>
								</tr>
							</table>
						</form>';
					}
					else{
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						header("Location: acasa.php");
					}
				?>
				<br>Nu aveti un cont? Click <a href=index.php>aici</a> pentru a va face unul.
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Login</title>

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
		<?php
			session_start();
			if (isset($_SESSION['username']))
			{
				header('Location: acasa.php');
			}
		?>
        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-6 portfolio-item">
                <h3>
					<font color=#337AB7>Login</font>
                </h3>
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
				</form>
            </div>
            <div class="col-md-6 portfolio-item">
                <h3>
                    <font color=#337AB7>Register</font>
                </h3>
				<form name="register_form" action="register.php" method="post">
					<table width="100%" border="0" cellpadding="0" cellspacing="2">
						<tr>
							<td width="40%">Nume</td>
							<td><input type="text" name="register_name" id="register_name" /></td>
						</tr>
						<tr>
							<td width="40%">Prenume</td>
							<td><input type="text" name="register_sname" id="register_sname" /></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="register_username" id="register_username" /></td>
						</tr>
						<tr>
							<td>Parola</td>
							<td><input type="password" name="register_password" id="register_password" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="register_btn" value="Inregistrare" /></td>
						</tr>
					</table>  
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

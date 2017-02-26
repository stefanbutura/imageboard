<?php
session_start();
require_once("dbconnect.php");
$IDunlike=$_POST['Unlike'];
$username = $_SESSION['username'];
$query = "DELETE FROM likeuripoze WHERE IDPoza='$IDunlike' and username='$username'";
$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
if ($result) {
	header("Location: acasa.php");

}



?>
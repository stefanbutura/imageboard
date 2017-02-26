<?php
session_start();
require_once("dbconnect.php");
$IDPoza=$_POST['Delete'];
$username = $_SESSION['username'];
$query = "DELETE FROM poze WHERE IDPoza='$IDPoza'";
$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
if ($result) {
	header("Location: acasa.php");

}



?>
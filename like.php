<?php
session_start();
require_once("dbconnect.php");
$IDLike=$_POST['Like'];
$username = $_SESSION['username'];
$query = "INSERT INTO likeuripoze (IDPoza, username) VALUES ('$IDLike','$username')";
$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
if ($result) {
	header("Location: acasa.php");
}



?>
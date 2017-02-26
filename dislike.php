<?php
session_start();
require_once("dbconnect.php");
$IDDislike=$_POST['Dislike'];
$username = $_SESSION['username'];
$query = "DELETE FROM likeuripoze WHERE IDPoza='$IDDislike'";
$result = mysqli_query($db, $query) or die ( mysqli_error($db) );
if ($result) {
	header("Location: acasa.php");
}



?>
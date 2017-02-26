<?php
session_start();
require_once("dbconnect.php");
$comment=$_POST['comment_text'];
$username=$_SESSION['username'];
$IDPoza=$_POST['commentz'];
$query="INSERT INTO comentarii (IDPoza, username, comentariu, data) VALUES ('$IDPoza', '$username', '$comment', now())";
$result = mysqli_query($db, $query) or die ( mysqli_error($db) );

if ($result) {
		header("Location: comentarii.php?comment={$IDPoza}");
	}
?>
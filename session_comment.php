<?php
session_start();
require_once("dbconnect.php");

$IDPoza=$_POST['comment'];
$_SESSION['comment']=$IDPoza;

header("Location: comentarii.php");
?>
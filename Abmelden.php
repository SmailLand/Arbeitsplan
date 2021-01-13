<?php
include "db_connection.php";
$sql = "DELETE FROM logindaten ";
	$result = $mysqli->query($sql);
$_SESSION["result"] = array();
header("Location: index.php");

?>
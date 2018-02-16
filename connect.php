<?php

function connect(){
	global $conn;
	$conn = mysqli_connect("localhost:3306", "root", "", "CupShop");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}
?>
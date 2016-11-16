<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "magazinedb";
	//$baseURL = "http://cmrsystem.projectcyphers.com";
	$baseURL = "http://marketingmag.local:81";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>

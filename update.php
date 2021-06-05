<?php

	include('conn.php');
	$id = $_GET['q'];

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

	$query = "UPDATE `customers` 
		SET name = '$name', address = '$address', phone = '$phone'
		WHERE id = '$id'";

	if (mysqli_query($conn, $query)) {
		header("location: index.php");
	} else {
		echo 'Failed to Update.';
	}
	

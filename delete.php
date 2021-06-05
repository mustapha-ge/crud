<?php

	include('conn.php');

	$id = $_GET['q'];


	$query = "DELETE FROM `customers` WHERE id = '$id'";

	if (mysqli_query($conn, $query)) {
		header("location: index.php");
	} else {
		echo 'Connot Delete';	
	}


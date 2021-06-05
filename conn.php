<?php

	@$conn = mysqli_connect('localhost','root','','wdacrud');

	if (!$conn) {
		die("Failed to connect");
	}

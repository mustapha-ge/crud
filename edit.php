<?php

	include('conn.php');

	$id = $_GET['q'];

	$query = "SELECT id, name, address, phone FROM `customers` WHERE id = '$id'";

	$run_query = mysqli_query($conn, $query);

	$customers =  mysqli_fetch_assoc($run_query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>

	<h1>Edit</h1>
	<hr>

	<!-- Create Contacts Form -->

	<fieldset>
		<legend>Customers</legend>

		<form method="POST" action="update.php?q=<?= $customers['id']; ?>">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" value="<?= $customers['name']; ?>" required></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><input type="text" value="<?= $customers['address']; ?>" name="address" required></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" value="<?= $customers['phone']; ?>" required></td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						<input type="submit" name="submit" value="Update Customers"> 
					</td>
				</tr>
			</table>
		</form>

	</fieldset>



</body>
</html>
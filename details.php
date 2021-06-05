<?php

	include('conn.php');

	$id = $_GET['q'];

	$query = "SELECT id, name, address, phone FROM `customers` WHERE id = '$id'";

	$run_query = mysqli_query($conn, $query);

    $customers =  mysqli_fetch_all($run_query, MYSQLI_ASSOC);
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>

	<h2>Contact Detail</h2>
	<hr>

	<a href="index.php"><button>Back</button></a>

	<fieldset>
		<legend>Contact</legend>
		<?php foreach ( $customers as $cust ): ?>
	<table border="1" cellspacing="5" cellpadding="3" width="50%" height="300px">
		<tr>
			<th>#ID</th>
			<td> <?= $cust['id']; ?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td> <?= $cust['name']; ?> </td>
		</tr>
		<tr>
			<th>Addresse</th>
			<td> <?= $cust['address']; ?> </td>
		</tr>
		<tr>
			<th>Phone</th>
			<td> <?= $cust['phone']; ?> </td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<a href="delete.php?q=<?= $customers->id; ?>" onclick="return confirm('Are you sure')"><button>Delete</button></a>
			</td>
		</tr>
		
	</table>
		<?php endforeach; ?>
	</fieldset>

</body>
</html>
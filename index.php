
<?php

	include('conn.php');




	$varS = "1, 2,3,4 ,5a6,7 ,8,9";
	var_dump(explode('pop', $varS));

	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$query = "INSERT INTO `customers` (name, address, phone)
			VALUES ('$name','$address','$phone');";
		mysqli_query($conn, $query);
	}
	
	if(isset($_POST['submit_delete'])) {
		$ids = $_POST['ids'];
		$ids = implode(',', $ids); // array to string convertion
		$query = "DELETE FROM `customers` WHERE id IN ($ids)";
		mysqli_query($conn, $query);
	}
	
	$query = "SELECT * FROM `customers`";
	$run_query = mysqli_query($conn, $query);
	$customers =  mysqli_fetch_all($run_query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
</head>
<body>
	<!-- Customers List -->
	<h1>Customers List</h1>
	<hr>

	<?php

	if ( $run_query->num_rows == 0 ) {
		echo "<strong style='color: orange'>No data found. </strong>";
	} else {

	?>

	<fieldset>
		<legend>Customers List</legend>

		<form method="POST" action="index.php">
			<table border="1" width="50%" cellpadding="5" cellspacing="5">
				<tr>
					<th>#ID</th>
					<th>Name</th>
					<th>Birthdate</th>
					<th>Address</th>
					<th>Action</th>
				</tr>

				<?php foreach ( $customers as $line ): ?>
					<tr>
						<td> <input type="checkbox" name="ids[]" value="<?= $line['id']; ?>" /> <?= $line['id']; ?> </td>
						<td> <?= $line['name']; ?> </td>
						<td> <?= $line['birthdate']; ?> </td>
						<td> <?= $line['address']; ?> </td>
						<td>
							<a href="delete.php?q=<?= $line['id']; ?>" onclick="return confirm('Are you sure you want to delete this?')"><button>Delete</button></a>
							<a href="details.php?q=<?= $line['id']; ?>"><button>Details</button></a>
							<a href="edit.php?q=<?= $line['id']; ?>"><button>Update</button></a>
						</td>
					</tr>
				<?php endforeach; ?>

			</table>
			
			<button type="submit" name="submit_delete"> Delete checked </button>
		</form>

	</fieldset>

<?php } ?>

	<h1>Create Customers</h1>
	<hr>

	<!-- Create Customers Form -->
	<fieldset>
		<legend>Customers</legend>

		<form method="POST" action="index.php">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" required></td>
				</tr>
				<tr>
					<td>address:</td>
					<td><input type="text" name="address" required></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" required></td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
						<button type="submit" name="submit"> Create Contact </button>
					</td>
				</tr>
			</table>
		</form>

	</fieldset>

</body>
</html>
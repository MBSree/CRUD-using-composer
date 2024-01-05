<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD operations</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>

<body>
	<div class="container">
		<button class="btn btn-primary my-5"><a href="form.php" class="text-light">Add User</a></button>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Sl. No.</th>
					<th scope="col">User Name</th>
					<th scope="col">EMail Id</th>
					<th scope="col">Password</th>
					<th scope="col">Address</th>
					<th scope="col">Phone Number</th>
					<th scope="col">Operation</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * from employee";
				$data = mysqli_query($conn, $query);
				if ($data) {
					while ($row = mysqli_fetch_assoc($data)) {
						$id = $row['id'];
						$username = $row['username'];
						$email = $row['email'];
						$password = $row['password'];
						$address = $row['address'];
						$phonenumber = $row['phonenumber'];
						echo "<tr>
      <th scope='row'>$id</th>
      <td>" . $username . "</td>
      <td>" . $email . "</td>
      <td>" . $password . "</td>
      <td>" . $address . "</td>
      <td>" . $phonenumber . "</td>
      <td>
      	<button style='background-color: #32CD32;'><a href='update.php?updateid=".$id."' class='text-light'>Update</a></button>
      	<button style='background-color: red;'><a href='delete.php?deleteid=".$id."' class='text-light'>Delete</a></button>
      </td>
    </tr>";
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>
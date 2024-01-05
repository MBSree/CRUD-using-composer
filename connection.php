<?php
// $servername = "localhost";
// $user_name = "root";
// $password = "";
// $dbname = "crud_operations";

// $conn = mysqli_connect($servername, $user_name, $password, $dbname);

// if ($conn) {
// 	//		echo "Connection Successfull";
// } else {
// 	//echo "Connection Failed" . mysqli_connect_error();
// 	die(mysqli_error($conn));
// }
?>


<?php
$servername = "localhost";
$user_name = "root";
$password = "";
$dbname = "crud_operations";

$conn = mysqli_connect($servername, $user_name, $password, $dbname);

if (!$conn) {
    die(mysqli_connect_error());
}

?>


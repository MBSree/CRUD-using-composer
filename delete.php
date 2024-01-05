<?php
	include("connection.php");
	if(isset($_GET['deleteid'])){
		$id=$_GET['deleteid'];

		$query="delete from employee where id=$id";
		$result=mysqli_query($conn,$query);
		if($result){
			header('location:display.php');
		}
		else{
			die(mysqli_error($conn));
		}
	}
?>
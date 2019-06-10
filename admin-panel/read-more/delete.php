<?php
include('../db_connection/connection.php');

$editresult  = mysqli_query($database, "SELECT * FROM client_profile");

if (isset($_GET['id'])) {
	
	$id = (int)$_GET['id'];

	$query = "DELETE FROM client_profile WHERE id= " . $id; 
}	else {
	echo "No ID Set";
}	

$result = mysqli_query($database,$query);

if ($result) {
	$_SESSION['sucess_message'] = 'User Data Deleted Sucessfully';
	header('location: index.php');
}	else 	{
	$_SESSION['error_message'] = 'User Data Couldnot Be Deleted';
	header('location: index.php');
	
}

if (isset($_POST['delete'])) {
	$short_description = $_POST['short_description'];
	$description_heading = $_POST['description_heading'];
	$description = $_POST['description'];
	$button_name = $_POST['button_name'];
	$status = $_POST['status'];
}
?>
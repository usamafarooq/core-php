<?php
include ('../db_connection/connection.php');

$resultedit = mysqli_query($database, "SELECT * FROM our_services");


if (isset($_GET['id'])) {
	
	$id = (int)$_GET['id'];

	$query = "DELETE FROM our_services WHERE id=" . $id;
}	else 	{
	echo "<p style='padding-left:25px;'>"."NO Id Set";
}	

$result = mysqli_query($database,$query);

if ($result) {
	$_SESSION['sucess-message'] = 'Data Deleted Sucessfully,';
	header('location: index.php');
}	else {
	$_SESSION['error-message'] = 'Data Couldnot Deleted.';
	header('location: index.php');
}

if (isset($_POST['delete'])) {
	$designation = $_POST['designation'];
	$experience = $_POST['experience'];
	$flip_content = $_POST['flip_content'];
	$status = $_POST['status'];

}
?>
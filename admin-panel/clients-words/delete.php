<?php
// include 'header.php'; 
include('../db_connection/connection.php');


//delete function.
$editresult = mysqli_query($database, "SELECT * FROM client_words");

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $query = "DELETE FROM client_words WHERE id =" . $id;
}else{
    echo 'No id set';
}

//query execution
$result = mysqli_query($database,$query);

//display message to user 
if($result){
    $_SESSION['success_message'] = 'User data deleted successfully';
    header('Location: index.php');
}else{
    $_SESSION['error_message'] = 'User data couldnot be deleted';
    header('Location: index.php');
}

if (isset($_POST['delete'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$client_name = $_POST['client_name'];
	$client_designation = $_POST['client_designation'];
	$status = $_POST['status'];
}

?>
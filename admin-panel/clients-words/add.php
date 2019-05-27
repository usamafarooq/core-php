<?php
include '../slider/header.php'; 
include('../db_connection/connection.php');

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$client_name = $_POST['client_name'];
	$client_designation = $_POST['client_designation'];
	$status = $_POST['status'];

	$target_dir = "C:/xampp/htdocs/core-php/admin-panel/uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg");

	if(empty($title) || empty($description) || empty($client_name) || empty($client_designation) || empty($status)){

        if(empty($title)){
            echo "<font color='red'>Title field is empty.</font><br/>";
        }
        if(empty($description)){
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        if(empty($client_name)){
            echo "<font color='red'>Client_Name field is empty.</font><br/>";
        }
        if(empty($client_designation)){
            echo "<font color='red'>Designation field is empty.</font><br/>";
        }
        if(empty($status)){
            echo "<font color='red'>Status field is empty.</font><br/>";
        }
        if(empty($file_browser)){
            echo "<font color='red'>Image field is empty.</font><br/>";
        }
    }
    else{
    	$result = mysqli_query($database, "INSERT INTO client_words(title,description,client_name,client_designation,status,image) VALUES ('$title','$description','$client_name','$client_designation','$status','$image')");
        if($result){
            echo "<font color='green'>Data added successfully.";
        }else{
            echo "Try Again.";
        }       
    }
    // echo 'imageUpload';
}

?>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row">
	<div class="col-md-12">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Slide
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form enctype="multipart/form-data" class="kt-form" method="POST" action="">
				<div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <div></div>
                        <input class="form-control" name="title" type="text" value="" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="button_text">Client Name</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="client_name" id="client_name">
                    </div>
                    <div class="form-group">
                        <label for="button_url">Client Designation</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="client_designation" id="client_designation">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div></div>
                        <select class="custom-select form-control" name="status">
                            <option value="" selected>Select</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label>File Browser</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" name="imageUpload" id="imageUpload">
						  	<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</form>
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->
	</div>
</div></div>
<!-- end:: Content -->				</div>				
				
				<?php include '../slider/footer.php'; ?>
<?php
include ('../slider/header.php');
include ('../db_connection/connection.php');

if (isset($_POST['submit'])) {
	$designation = $_POST['designation'];
	$experience = $_POST['experience'];
	$flip_content = $_POST['flip_content'];
	$status = $_POST['status'];

	$target_dir = "C:/xampp/htdocs/core-php/admin-panel/our_services_uploads/";
	$target_file = $target_dir . basename($_FILES['imageUpload']['name']);
	$uploadOK = 1;
	$ImageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "<p style='padding-left:25px;'>"."Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg");
    if (empty($designation) || empty($experience) || empty($flip_content) || empty($status)) {
    	if (empty($file_browser)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Image field is empty.</font><br/>";
    	}
    	if (empty($designation)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Designation field is empty.</font><br/>";
    	}
    	if (empty($experience)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Experience field is empty.</font><br/>";
    	}
    	if (empty($flip_content)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Flip Content field is empty.</font><br/>";
    	}
    	if (empty($status)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Status field is empty.</font><br/>";
    	}
    }	else {
    	$result = mysqli_query ($database,"INSERT INTO our_services(image,designation,experience,flip_content,status) VALUES ('$image', '$designation', '$experience', '$flip_content', '$status')");
    	if ($result) {
    		echo "<p style='padding-left:25px;'>"."<font color='green'>Data added successfully.";
    	}	else 	{
    		echo "<p style='padding-left:25px;'>"."Try Again.";
    	}
    }

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
						Add Our Services
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form enctype="multipart/form-data" class="kt-form" method="POST" action="">
				<div class="kt-portlet__body">
                    <div class="form-group">
						<label>File Browser</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" name="imageUpload" id="imageUpload">
						  	<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="designation" id="designation">
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="experience" id="Experience">
                    </div>
                    <div class="form-group">
                        <label for="flip_content">Flip Content</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="flip_content" id="flip_content">
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
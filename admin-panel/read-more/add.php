<?php 
include '../slider/header.php'; 
include('../db_connection/connection.php');

if (isset($_POST['submit'])) {
	$short_description = $_POST['short_description'];
	$description_heading = $_POST['description_heading'];
	$description = $_POST['description'];
	$button_name = $_POST['button_name'];
	$status = $_POST['status'];


	$target_dir = "C:/xampp/htdocs/core-php/admin-panel/read_more_uploads/";
	$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg");

    if (empty($short_description) || empty($description_heading) || empty($description) || empty($status)){

    	if(empty($file_browser)){
            echo "<font color='red'>Image field is empty.</font><br/>";
        }
        if(empty($short_description)){
            echo "<font color='red'>Short Description field is empty.</font><br/>";
        }
        if(empty($description_heading)){
            echo "<font color='red'>Description Heading field is empty.</font><br/>";
        }
        if(empty($description)){
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        if(empty($button_name)){
            echo "<font color='red'>Button Name field is empty.</font><br/>";
        }
        if(empty($status)){
            echo "<font color='red'>Status field is empty.</font><br/>";
        }
    }
    else{
    	$result = mysqli_query($database, "INSERT INTO client_profile(image,short_description,description_heading,description,button_name,status) VALUES ('$image','$short_description','$description_heading','$description','$button_name','$status')");
        if($result){
            echo "<font color='green'>Data added successfully.";
        }else{
            echo "Try Again.";
            // print_r(mysqli_error($database));
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
						Add Client Details
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
                        <label for="short_description">Short_Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="short_description" id="short_description">
                    </div>
                    <div class="form-group">
                        <label for="description_heading">Description Heading</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="description_heading" id="description_heading">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="button_name">Button Name</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="button_name" id="button_name">
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
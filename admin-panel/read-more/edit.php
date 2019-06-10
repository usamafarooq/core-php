<?php
include('../slider/header.php');
include('../db_connection/connection.php');

$id = $_GET['id'];
$editrecord = mysqli_query($database,"SELECT * FROM client_profile WHERE id=$id");
while($editrecordres = mysqli_fetch_array($editrecord)){
$short_descriptionn = $editrecordres['short_description'];
$description_headingg = $editrecordres['description_heading'];
$descriptionn = $editrecordres['description'];
$button_namee = $editrecordres['button_name'];
$statuss = $editrecordres['status'];

}

// $editresult = mysqli_query($database, "SELECT * FROM client_words");
if (isset($_POST['submit'])) {
    $short_description = $_POST['short_description'];
    $description_heading = $_POST['description_heading'];
    $description = $_POST['description'];
    $button_name = $_POST['button_name'];
    $status = $_POST['status'];

    // echo $status;
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


    if(empty($short_description) || empty($description_heading) || empty($description) || empty($button_name) || empty($status)){

        if(empty($short_description)){
            echo "<font color='red'>short_description field is empty.</font><br/>";
        }
        if(empty($description_heading)){
            echo "<font color='red'>description_heading field is empty.</font><br/>";
        }
        if(empty($description)){
            echo "<font color='red'>description field is empty.</font><br/>";
        }
        if(empty($button_name)){
            echo "<font color='red'>button_name field is empty.</font><br/>";
        }
        if(empty($status)){
            echo "<font color='red'>Status field is empty.</font><br/>";
        }
    }
    else{
        $result = mysqli_query($database, "UPDATE client_profile SET short_description='$short_description', description_heading='$description_heading', description ='$description', button_name = '$button_name', status = '$status', image = '$image' WHERE id=$id");         
        if($result){
            echo "<font color='green'>Data added successfully.";
        }else{
            echo "Try Again.";
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
                        Edit Client Profile
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
                        <label for="short_descriptionn">Short Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="<?php echo $short_descriptionn; ?>" name="short_description" id="short_descriptionn">
                    </div>
                    <div class="form-group">
                        <label for="description_heading">Description Heading</label>
                        <div></div>
                        <input class="form-control" type="text" value="<?php echo $description_headingg; ?>" name="description_heading" id="description_heading">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="<?php echo $descriptionn; ?>" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="button_name">Button Name</label>
                        <div></div>
                        <input class="form-control" type="text" value="<?php echo $button_namee; ?>" name="button_name" id="button_name">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div></div>
                        <select class="custom-select form-control" name="status">
                            <option <?php if ($statuss == 1 ) echo 'selected' ; ?> value="1">Enable</option>
                            <option <?php if ($statuss == 2 ) echo 'selected' ; ?> value="2">Disable</option>
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
<!-- end:: Content -->              </div>              
                

<?php include('../slider/footer.php') ?>
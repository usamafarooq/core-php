<?php

include ('../slider/header.php');
include ('../db_connection/connection.php');


if (isset($_POST['submit'])) {
	$portfolio_category = $_POST['portfolio_category'];
	$status = $_POST['status'];

	
    if (empty($portfolio_category) || empty($status)) {
    	if (empty($portfolio_category)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Portfolio Category field is empty.</font><br/>";
    	}
    	if (empty($status)) {
    		echo "<p style='padding-left:25px;'>"."<font color='red'>Status field is empty.</font><br/>";
    	}
    }	else {
    	$result = mysqli_query ($database,"INSERT INTO portfolio(portfolio_category,status) VALUES ('$portfolio_category', '$status')");
    	if ($result) {
    		echo "<p style='padding-left:25px;'>"."<font color='green'>Data added successfully.";
    	}	else 	{
    		echo "<p style='padding-left:25px;'>"."Try Again.";
    	}
    }

}
?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row">
	<div class="col-md-12">

		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Portfolios
					</h3>
				</div>
			</div>
			<!--begin::Form-->	
			<form enctype="multipart/form-data" class="kt-form" method="POST" action="">
				<div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="portfolio_category">Portfolio Category</label>
                        <div></div>
                        <input class="form-control" type="text" value="" name="portfolio_category" id="portfolio_category">
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
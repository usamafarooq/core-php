<?php
include 'header.php'; ?>

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
			<form class="kt-form">
				<div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <div></div>
                        <input class="form-control" type="text" value="" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div></div>
                        <input class="form-control" type="text" value="" id="description">
                    </div>
                    <div class="form-group">
                        <label for="button_text">Button Text</label>
                        <div></div>
                        <input class="form-control" type="text" value="" id="button_text">
                    </div>
                    <div class="form-group">
                        <label for="button_url">Button Url</label>
                        <div></div>
                        <input class="form-control" type="text" value="" id="button_url">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div></div>
                        <select class="custom-select form-control">
                            <option selected>Select</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label>File Browser</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" id="customFile">
						  	<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="reset" class="btn btn-primary">Submit</button>
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
				
				<?php include 'footer.php'; ?>
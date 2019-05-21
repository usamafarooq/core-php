<?php 
include('../db_connection/connection.php');

$result = mysqli_query($database, "SELECT * FROM slider");


include 'header.php'; ?>
                                                        <!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="alert alert-light alert-elevate" role="alert">
    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
    <div class="alert-text">
        Saved!
    </div>
</div>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Slider
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
    <div class="kt-portlet__head-actions">
        &nbsp;
        <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            New Record
        </a>
    </div>  
</div>      </div>
    </div>

    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Button Text</th>
                    <th>Button Url</th>
                    <th>Image</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) == 1) {
                while($res = mysqli_fetch_array($result)){
                ?> 
                <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['title']; ?></td>
                    <td><?php echo $res['description']; ?></td>
                    <td><?php echo $res['button_text']; ?></td>
                    <td><?php echo $res['button_url']; ?></td>
                    <td><?php echo $res['image']; ?></td>
                    <td><?php echo $res['created_at']; ?></td>
                    <td><?php echo $res['updated_at']; ?></td>
                    <td><?php echo $res['status']; ?></td>
                    
                    <td nowrap></td>
                </tr>  
                <?php } }?>                      
            </tbody>            
        </table>
        <!--end: Datatable -->
    </div>
</div></div>
<!-- end:: Content -->
</div>              
                
                
<?php include 'footer.php'; ?>
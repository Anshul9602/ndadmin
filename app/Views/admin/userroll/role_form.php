<?= $this->include('admin/common/header') ?>
<div class="content-body">

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <div class="welcome-text">
                    <h4>Add Role</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Roles</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Role</a></li>

                    </ol>
                </div>
            </div>
            <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
               
                    <button class="btn btn-primary btn-rounded"id="save_btn1">
                        Save
                    </button>
              &nbsp;
                <button class="btn btn-danger btn-rounded">
                    <li class="fa fa-arrow-left"></li>
                </button>

            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/role/role_form/'. $token); ?>" method="post">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-home mr-2"></i> General</a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                        <div class="row pt-2">
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="name" placeholder="Category name">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="order" placeholder="Sort Order">
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control form-control-lg" name="status">
                                                    <option value="Enable">Enable</option>
                                                    <option value="Disable">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <p class="mb-0">Category Description</p>
                                                <div class="summernote pt-0" name="dis"></div>
                                            </div>
                                        </div>


                                        
                                        <button type="submit" value="submit" class="btn d-none" id="s_btnn1">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form><!-- Nav tabs -->



                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
<script>
    // Attach a click event to the first button
    document.getElementById('save_btn1').addEventListener('click', function() {
        // Trigger a click on the second button
        document.getElementById('s_btnn1').click();
    });

</script>

<?= $this->include('admin/common/footer') ?>
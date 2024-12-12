<?= $this->include('admin/common/header') ?>
<div class="content-body">

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <div class="welcome-text">
                    <h4>Add Category</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Catalog</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Category</a></li>

                    </ol>
                </div>
            </div>
            <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
               
                    <button class="btn btn-primary btn-rounded"id="save_btn">
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
                        <form action="<?php echo base_url('admin/catalog/category_form/'. $token); ?>" method="post">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-home mr-2"></i> General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1"><i class="la la-file mr-2"></i> Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contact1"><i class="la la-envelope mr-2"></i> Alert</a>
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


                                        <div class="tab-pane fade" id="profile1">
                                            <div class="pt-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>Images</h4>
                                                        <button style="float:right; margin-top:-40px" class="btn btn-primary">
                                                            <li class="fa fa-plus"></li>
                                                        </button>
                                                        <hr />

                                                    </div>
                                                    <div class="col-2">
                                                        <img src="<?php echo base_url('assets/images/card/2.png'); ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="sort order" class="form-control">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="Image title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <hr />
                                                        <h4>Videos</h4>
                                                        <button style="float:right; margin-top:-40px" class="btn btn-primary">
                                                            <li class="fa fa-plus"></li>
                                                        </button>
                                                        <hr />

                                                    </div>
                                                    <div class="col-2">
                                                        <img src="<?php echo base_url('assets/images/card/2.png'); ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="sort order" class="form-control">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="Video title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <hr />
                                                        <h4>Files</h4>
                                                        <button style="float:right; margin-top:-40px" class="btn btn-primary">
                                                            <li class="fa fa-plus"></li>
                                                        </button>
                                                        <hr />

                                                    </div>
                                                    <div class="col-2">
                                                        <img src="<?php echo base_url('assets/images/card/2.png'); ?>" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="sort order" class="form-control">
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" placeholder="Files title" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact1">
                                            <div class="pt-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" style="float:right">Add New Alert</button>
                                                        <table style="width:100%" class="table table-responsive table-striped w-100">
                                                            <thead style="width:100%">
                                                                <tr>
                                                                    <th>
                                                                        S.No
                                                                    </th>
                                                                    <th>Alert Name</th>
                                                                    <th>Alert Type</th>
                                                                    <th>Trigger</th>
                                                                    <th>Frequancy</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1.</td>
                                                                    <td>Low Inventory</td>
                                                                    <td>App Notification, Email</td>
                                                                    <td>Quantity < 100</td>
                                                                    <td>Once per day</td>
                                                                    <td>Active</td>
                                                                </tr>
                                                            </tbody>


                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="submit" value="submit" class="btn d-none" id="s_btnn">submit</button>
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
    document.getElementById('save_btn').addEventListener('click', function() {
        // Trigger a click on the second button
        document.getElementById('s_btnn').click();
    });

</script>

<?= $this->include('admin/common/footer') ?>
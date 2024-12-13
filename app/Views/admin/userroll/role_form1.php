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

                <button class="btn btn-primary btn-rounded" id="save_btn1">
                    Save
                </button>
                &nbsp;
                <button class="btn btn-danger btn-rounded">
                    <li class="fa fa-arrow-left"></li>
                </button>

            </div>
        </div>
        <!-- row -->
        <style>
            #persel .bootstrap-select{
                width: 100%;
            }
        </style>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/role/role_form/' . $token); ?>" method="post">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-home mr-2"></i> General</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                        <div class="row pt-2">
                                            <div class="col-sm-5 mt-3">
                                                <input type="text" class="d-none" name="id" value="<?= $role->id ?>">
                                            <label for="workSelection"style="color:#000;">Name Of Role</label>
                                                <input type="text" class="form-control" name="name" value="<?= $role->name ?>" placeholder="Enter role">
                                            </div>
                                            <div class="col-sm-5 mt-3"id="persel">
                                                <label for="workSelection"style="color:#000;">Select Permission:</label>
                                                <br>
                                                <?php
// Assuming $role->permission is a string like "edit,delete"
$selectedPermissions = explode(',', $role->permission); // Convert to an array
?>
                                                <select id="workSelection" name="permission[]" multiple style="width: 100%;">
    <option value="edit" <?= in_array('edit', $selectedPermissions) ? 'selected' : '' ?>>Edit</option>
    <option value="delete" <?= in_array('delete', $selectedPermissions) ? 'selected' : '' ?>>Delete</option>
    <option value="update" <?= in_array('update', $selectedPermissions) ? 'selected' : '' ?>>Update</option>
    <option value="view" <?= in_array('view', $selectedPermissions) ? 'selected' : '' ?>>View</option>
</select>
                                            </div>
                                            <div class="col-sm-5 mt-3">
                                            <label for="workSelection" style="color:#000;">Status</label>
                                                <select class="form-control form-control-lg" name="status">
                                                <option value="1" <?= $role->status == 1 ? 'selected' : '' ?>>Enable</option>
                                                <option value="0" <?= $role->status == 0 ? 'selected' : '' ?>>Disable</option>
                                                </select>
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
document.addEventListener("DOMContentLoaded", function() {
    // Remove the 'active' class from the 'des-menu' item
    const desMenu = document.getElementById("des-menu");
    const des = document.getElementById("dashboard");
    if (desMenu) {
        desMenu.classList.remove("active");
    }
    if (des) {
        des.classList.remove("show");
        des.classList.remove("active");
    }

    // Add the 'active' class to the 'cat-menu' item
    const catMenu = document.getElementById("user-menu");
    const cat = document.getElementById("apps");
    if (catMenu) {
        catMenu.classList.add("active");
    }
    if (cat) {
        cat.classList.add("show");
        cat.classList.add("active");
    }
});
</script>
<script>
    // Attach a click event to the first button
    document.getElementById('save_btn1').addEventListener('click', function() {
        // Trigger a click on the second button
        document.getElementById('s_btnn1').click();
    });
</script>

<?= $this->include('admin/common/footer') ?>
<?= $this->include('admin/common/header') ?>
<?= $this->include('admin/common/menu') ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Manage Hotels</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button type="button" class="btn btn-rounded btn-primary open-add-form">
                    <span class="btn-icon-left text-primary">
                        <i class="fa fa-plus"></i>
                    </span>Add New Hotel
                </button>
            </div>
        </div>
        <!-- Filter Row -->
        <div class="col-12">
            <div class="filter cm-content-box box-primary">
                <div class="content-title">
                    <div class="cpa">
                        <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                    </div>
                    <div class="tools">
                        <a href="javascript:void(0);" class="expand SlideToolHeader"><i
                                class="fal fa-angle-down"></i></a>
                    </div>
                </div>
                <div class="cm-content-body form excerpt">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <input type="text" class="form-control mb-xl-0 mb-3" id="exampleFormControlInput1"
                                    placeholder="Title">
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                <select class="form-control default-select dashboard-select-2 h-auto wide"
                                    aria-label="Default select example">
                                    <option selected>Select Status</option>
                                    <option value="1">Published</option>
                                    <option value="2">Draft</option>
                                    <option value="3">Trash</option>
                                    <option value="4">Private</option>
                                    <option value="5">Pending</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <input type="date" name="datepicker" class="form-control mb-xl-0 mb-3">
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <button class="btn btn-primary" title="Click here to Search" type="button"><i
                                        class="fa fa-search me-1"></i>Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter Row End -->

        <!-- Candidate List Start -->
        <div class="col-12 mx-0 mtm-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Hotels</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Personal Info</th>
                                    <th>Contact</th>
                                    <th style="text-align: center;">Referred Status</th>

                                    <th>Registration Date</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // print_r($users);

                                if ($users !== null && !empty($users)): ?>
                                    <?php foreach ($users as $index => $user): ?>
                                        <tr>
                                            <td>
                                                <?= $index + 1 ?>
                                            </td>
                                            <td>

                                                <div class="d-flex align-items-center open-view-form" style="cursor: pointer;" data-id="<?= $user->user_id ?>">
                                                    <img src="<?= $user->image_url ?>" class="rounded-lg me-1" width="44"
                                                        alt="">
                                                    <span class="w-space-no">
                                                        <?= $user->name ?>
                                                        <br />
                                                        <?= $user->city . ', ' . $user->state ?>
                                                    </span>
                                                </div>

                                            </td>
                                            <td>
                                                <span>
                                                    <i class="fa fa-mobile color-muted"></i>
                                                    <?= $user->mobile_number ?>
                                                    <br />
                                                    <a href="mailto:<?= $user->email ?>">
                                                        <i class="fa fa-envelope"></i>
                                                        <?= $user->email ?>
                                                    </a>
                                                </span>
                                            </td>
                                            <td style="text-align: center;cursor: pointer;" class="open-view-ref"data-id="<?= $user->user_id ?>">
                                                <?php if ($user->ref_id === null): ?>
                                                    <span class="badge font-12 light badge-warning">Self</span>
                                                    <br><br><?= $user->points ?>
                                                <?php else: ?>
                                                    <?php if ($user->ref): ?>
                                                        <span class="badge font-12 light badge-success"><?= $user->ref->name ?></span>
                                                        <br><br><?= $user->points ?>
                                                    <?php else: ?>
                                                        <span class="badge font-12 light badge-warning">Self</span>
                                                        <br><br><?= $user->points ?><?php endif; ?>
                                                    <?php endif; ?>
                                            </td>

                                            <td>
                                            <?php
    // Assuming $user->created_at is in the format '06-26-2024 09:15 PM'
    $createdAt = DateTime::createFromFormat('m-d-Y h:i A', $user->created_at);

    if ($createdAt) {
        echo $createdAt->format('d/m/Y'); // Output in dd/mm/yyyy format
    } else {
        echo "Invalid date format"; // Handle the case where the date cannot be parsed
    }
?>             
                                            </td>
                                            <td>
                                                <div class="switch">
                                                    <input type="checkbox" data-id="<?= $user->user_id ?>"
                                                        id="switch<?= $user->id ?>" <?= $user->status == 'Enable' ? 'checked' :
                                                                                        '' ?> class="status_update" value="
                                            <?= $user->status ?>">
                                                    <label for="switch<?= $user->id ?>" class="switch-label"></label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button data-bs-toggle="modal" data-bs-target="#basicModal"
                                                    class="btn btn-danger btn-rounded delete-user"
                                                    data-id="<?= $user->user_id ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <button class="btn btn-warning btn-rounded open-edit-form"
                                                    data-id="<?= $user->user_id ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">User not found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Candidate List End -->

    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to delete this admin?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger confirm-delete">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal End -->

<!-- Overlay -->
<div class="overlay"></div>

<!-- Add New Candidate Form -->
<div class="right-sidebar big" id="addCandidateForm">
    <div class="sliding-form">
        <?= $this->include('admin/hotels/candidate_form') ?>
    </div>
</div>
<!-- Overlay -->
<div class="overlay"></div>

<!-- Add New Candidate Form -->
<div class="right-sidebar big" id="userInfo">
    <div class="sliding-form">
        <?= $this->include('admin/hotels/user_info_slider') ?>
    </div>
</div>
<div class="right-sidebar big" id="userref2">
    <div class="sliding-form">
        <?= $this->include('admin/hotels/user_info_slider1') ?>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Operation completed successfully.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.open-view-form').click(function() {

        var deptId = $(this).data('id');

        $.get(`<?= base_url('admin/hotels/view_app/getbyid') ?>/${deptId}`, function(data) {
            var userData = data[0];
            console.log(userData);
            var jobapply = data[0].job_app;
            var jobview = data[0].ref;
            // Populate input fields
            $('#view_name').val(userData.user.name);
            $('#view_phone').val(userData.phone_number);
            // Populate text elements
            $('#view_email').text(userData.user.email);
            $('#view_add').text(userData.user.address);
            $('#view_point').text(userData.points);
            $('#view_img').attr('src', userData.user_img);
            $('#view_resume').text(userData.resume);
            // Handle job application data
            if (jobapply !== null) {

                // Clear existing table rows
                $('#example3 tbody').empty();

                // Populate the table with jobapply data
                if (Array.isArray(jobapply) && jobapply.length > 0) {

                    // Populate the table with jobapply data
                    jobapply.forEach(function(item, index) {

                        var candidateInfo = `
                 <p style="    text-transform: capitalize;">
                     ${item.name} ${item.last_name}<br />
                     ${item.city}, ${item.state}<br />
                     <span style="    text-transform: capitalize;">${item.work_ex}</span><br/>
                     Mob - ${item.mobile_number}
                 </p>
             `;

                        var appliedDate = new Date(item.created_at).toLocaleDateString();



                        var row = `
                 <tr>
                     <td>${index + 1}.</td>
                     <td>${candidateInfo}</td>
                     <td>${appliedDate}</td>
                    
                 </tr>
             `;

                        $('#example3 tbody').append(row);

                    });
                } else {

                    var emptyRow = `
               <tr>
                   <td colspan="4">No data available</td>
               </tr>
           `;
                    $('#example3 tbody').append(emptyRow);
                }

                // Initialize or redraw DataTables
                if (!$.fn.DataTable.isDataTable('#example3')) {
                    $('#example3').DataTable({
                        "pageLength": 4
                    });
                }
            } else {

                // Logic for when jobapply is null
                $('#example3 tbody').empty().append(`
           <tr>
               <td colspan="4">No data available</td>
           </tr>
       `);
            }
            if (jobview !== null) {
                console.log(jobview);
                // Clear existing table rows
                $('#exampleViewd1 tbody').empty();

                // Populate the table with jobapply data
                if (Array.isArray(jobview) && jobview.length > 0) {

                    // Populate the table with jobapply data
                    jobview.forEach(function(item, index) {

                        var candidateInfo = `
                 <p style="    text-transform: capitalize;">
                    ${item.name} (${item.mobile_number})<br />
                     ${item.city}, ${item.state} <br />
                     
                 </p>
             `;

                        var points = '50';



                        var row = `
                 <tr>
                     <td>${index + 1}.</td>
                     <td>${candidateInfo}</td>
                     <td>${points}</td>
                     
                 </tr>
             `;

                        $('#exampleViewd1 tbody').append(row);

                    });
                } else {

                    var emptyRow = `
               <tr>
                   <td colspan="4">No data available</td>
               </tr>
           `;
                    $('#exampleViewd1 tbody').append(emptyRow);
                }

                // Initialize or redraw DataTables
                if (!$.fn.DataTable.isDataTable('#exampleViewd1')) {
                    $('#exampleViewd1').DataTable({
                        "pageLength": 4
                    });
                }
            } else {

                // Logic for when jobapply is null
                $('#exampleViewd tbody').empty().append(`
           <tr>
               <td colspan="4">No data available</td>
           </tr>
       `);
            }

            // Show the job info modal
            $('#userInfo').addClass('show');
            $('.overlay').addClass('show');
        });
    });
    $('.close-form, .overlay').click(function() {
        $('#userInfo').removeClass('show');
        $('.overlay').removeClass('show');
    });
    $('.open-view-ref').click(function() {

        var deptId = $(this).data('id');

        $.get(`<?= base_url('admin/hotels/view_app/getbyid') ?>/${deptId}`, function(data) {
            var userData = data[0];
            console.log(userData);
            var jobapply = data[0].job_app;
            var jobview = data[0].ref;
            // Populate input fields
            
            if (jobview !== null) {
                jobview.created_at = userData.user.created_at;

                // Clear existing table rows
                $('#exampleViewd1 tbody').empty();

                // Populate the table with jobapply data
                if (Array.isArray(jobview) && jobview.length > 0) {
                    
                    // Populate the table with jobapply data
                    jobview.forEach(function(item, index) {
                        var createdAtDate = new Date(item.created_at);
                    var formattedDate = `${('0' + createdAtDate.getDate()).slice(-2)}/${('0' + (createdAtDate.getMonth() + 1)).slice(-2)}/${createdAtDate.getFullYear()}`;

                        var candidateInfo = `
                 <p style="    text-transform: capitalize;">
                      ${item.name} (${item.mobile_number})<br />
                     ${item.city}, ${item.state} <br />
                     
                 </p>
             `;
             var date = `
                 <p style="    text-transform: capitalize;">
                     ${formattedDate}
                     
                 </p>
             `;
                        var points = '50';



                        var row = `
                 <tr>
                     <td>${index + 1}.</td>
                     <td>${candidateInfo}</td>
                     <td>${points}</td>
                     <td>${date}</td>
                     
                 </tr>
             `;

                        $('#exampleViewd1 tbody').append(row);

                    });
                } else {

                    var emptyRow = `
               <tr>
                   <td colspan="4">No data available</td>
               </tr>
           `;
                    $('#exampleViewd1 tbody').append(emptyRow);
                }

                // Initialize or redraw DataTables
                if (!$.fn.DataTable.isDataTable('#exampleViewd1')) {
                    $('#exampleViewd1').DataTable({
                        "pageLength": 4
                    });
                }
            } else {

                // Logic for when jobapply is null
                $('#exampleViewd tbody').empty().append(`
           <tr>
               <td colspan="4">No data available</td>
           </tr>
       `);
            }

            // Show the job info modal
            $('#userref2').addClass('show');
            $('.overlay').addClass('show');
        });
    });
    $('.close-form, .overlay').click(function() {
        $('#userInfo').removeClass('show');
        $('.overlay').removeClass('show');
    });



    $('.open-edit-form').click(function() {
        var deptId = $(this).data('id');
        $.get(`<?= base_url('admin/hotels/view/getbyid') ?>/${deptId}`, function(data) {

            var userData = data[0];

            console.log(userData);
            // Populate form fields with userData

            $('#mobile_number').val(userData.phone_number);
            $('#points').val(userData.points);
            $('#name').val(userData.user.name);
            $('#location').val(userData.user.location);
            $('#email').val(userData.user.email);

            $('#address').val(userData.user.address);
            $('#pin_code').val(userData.user.pin_code);
            $('#state').val(userData.user.state);
            $('#city').val(userData.user.city);
            $('#gst_number').val(userData.user.gst_number);
            $('#gst_name').val(userData.user.gst_name);
            $('#reg_email').val(userData.user.reg_email);
            $('#reg_hadd').val(userData.user.reg_hadd);
            $('#country').val(userData.user.country);
            $('#profile_pic').val(userData.user.user_img);
            $('#profile_pic_preview').attr('src', userData.user_img);
            // $('#profile_img').attr('src', userData.user_img);

            // Populate job preference fields
            if (userData.job_pref) {
                var jobPref = userData.job_pref[0];
                console.log(jobPref);
                $('#job_type').val(jobPref.job_type);
                $('#preferred_state').val(jobPref.pref_state);
                $('#preferred_city').val(jobPref.pref_city);
                $('#salary_range').val(jobPref.salary);
            }

            // Populate education fields
            if (userData.user_edu) {
                var edu = userData.user_edu[0];
                if (edu.ten_th === "on") {
                    $('#tenth_pass').prop('checked', true);
                } else if (edu.ten_th === "false") {
                    $('#tenth_pass').prop('checked', false);
                }
                $('#ten_school').val(edu.ten_school);
                $('#ten_year').val(edu.ten_year);
                if (edu.to_th === "on") {
                    $('#twelfth_pass').prop('checked', true);
                } else if (edu.to_th === "false") {
                    $('#twelfth_pass').prop('checked', false);
                }

                $('#to_th_school').val(edu.to_th_school);
                $('#to_th_year').val(edu.to_th_year);
                $('#graduate').prop('checked', edu.gra_dip === "true");
                $('#gr_degree').val(edu.gr_degree);
                $('#gr_university').val(edu.gr_university);
                $('#gr_year').val(edu.gr_year);
                $('#post_graduate').prop('checked', edu.post_gra === "true");
                $('#pg_degree').val(edu.pg_degree);
                $('#pg_university').val(edu.pg_university);
                $('#pg_year').val(edu.pg_year);
                $('#doctorate').prop('checked', edu.doc === "true");
                $('#doc_degree').val(edu.doc_degree);
                $('#doc_university').val(edu.doc_university);
                $('#doc_year').val(edu.doc_year);
                $('#hotel_management').prop('checked', edu.hotel_de === "true");
                $('#h_college').val(edu.h_college);
                $('#h_year').val(edu.h_year);
            }


            $('#formTitle').text('Edit User Data');
            $('#addCandidateForm').addClass('show');
            $('.overlay').addClass('show');
        });
    });

    $('.delete-user').click(function() {
        var deptId = $(this).data('id');

        // console.log(deptId);
        $('.confirm-delete').attr('data-id', deptId);
    });

    $('.confirm-delete').click(function() {
        var deptId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: `<?= base_url('/admin/hotels/view/delete') ?>/${deptId}`,
            success: function(response) {
                location.reload();
            }
        });
    });
    $('.status_update').click(function() {
        var deptId = $(this).data('id'); // Get the data-id attribute of the clicked checkbox
        // var status = $(this).value('data'); // Get the data-id attribute of the clicked checkbox

        $.ajax({
            type: 'POST',
            url: `<?= base_url('/admin/hotels/view/status_update') ?>/${deptId}`,
            success: function(response) {
                location.reload(); // Reload the page upon successful AJAX request
            },
            error: function(xhr, status, error) {
                // Handle any errors here
                console.error('Error:', error);
            }
        });
    });

    $(document).ready(function() {
        $('.open-add-form').click(function() {
            $('#addCandidateForm').addClass('show');
            $('.overlay').addClass('show');
        });
        $('.close-form, .overlay').click(function() {
            $('.right-sidebar').removeClass('show');
            $('.overlay').removeClass('show');
        });

    });
</script>

<?= $this->include('admin/common/footer') ?>
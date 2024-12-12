<?= $this->include('admin/common/header') ?>
<?= $this->include('admin/common/menu') ?>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles mx-0">
         <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
               <h4>Manage Jobs</h4>
            </div>
         </div>
         <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <button type="button" class="btn btn-rounded btn-primary open-add-form">
               <span class="btn-icon-left text-primary">
                  <i class="fa fa-plus"></i>
               </span>Add New Jobs
            </button>
         </div>
      </div>
      <!-- Filter Row -->
      <div class="row">
         <div class="col-12">
            <div class="filter cm-content-box box-primary">
               <div class="content-title">
                  <div class="cpa">
                     <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                  </div>
                  <div class="tools">
                     <a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fal fa-angle-down"></i></a>
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
      </div>
      <!-- Filter Row End -->
      <div class="row">
         <div class="col-12 mx-0 mtm-10">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">List of Jobs</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="example4" class="display" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Job Info</th>
                              <th>Qualificaion</th>
                              <th>Employer Info</th>
                              <th>Posting Date</th>
                              <th>Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                                
                              
                                
                                if ($jobs !== null && !empty($jobs)): ?>
                           <?php foreach ($jobs as $index => $job): ?>

                           <tr class="cursor-pointer" data-job-id="1">
                              <td>
                                 <?= $index + 1 ?>
                              </td>
                              <td>
                                 <p class="open-view-form"data-id="<?= $job->id ?>">
                                    <b class="font-16 text-info" style="text-transform: capitalize;">
                                       <?= $job->job_description ?>
                                    </b><br />
                                    <b class="text-upper">
                                       <?= $job->department ?> <br />
                                       Sal:
                                       <?= $job->off_salery ?>
                                    </b><br />
                                 </p>

                              </td>
                              <td>
                                 <p class="font-16">

                                    <?= $job->experience ?>
                                 </p>
                              </td>
                              <td>
                                 <span class="badge light badge-info font-16">
                                    <?= $job->name ?>,
                                    <?= $job->city ?>
                                 </span>
                                 <br />
                                 <span class="badge light badge-danger font-16">
                                    <?= $job->job_type ?>
                                 </span>
                              </td>
                              <td>
                                 <?php
    // Assuming $job->created_at is in the format '2024-06-25 15:37:17'
    $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $job->created_at);

    if ($createdAt) {
        echo $createdAt->format('d/m/Y'); // Output in dd/mm/yyyy format
    } else {
        echo "Invalid date format"; // Handle the case where the date cannot be parsed
    }
?>    
                              </td>
                              <td>
                                 <div class="switch">
                                    <input type="checkbox" data-id="<?= $job->id ?>"
                                        id="switch<?= $job->id ?>" <?=$job->status == '1' ? 'checked' :
                                    '' ?> class="status_update" value="
                                    <?= $job->status ?>">
                                    <label for="switch<?= $job->id ?>" class="switch-label"></label>
                                </div>
                               
                              </td>
                              <td class="text-center">
                                 <button data-bs-toggle="modal" data-bs-target="#basicModal"
                                    class="btn btn-danger btn-rounded delete-user"  data-id="<?= $job->id ?>">
                                    <i class="fa fa-trash"></i>
                                 </button>
                                 <button class="btn btn-warning btn-rounded open-edit-form" data-id="<?= $job->id ?>">
                                    <i class="fa fa-pencil"></i>
                                 </button>
                              </td>
                           </tr>
                           <?php endforeach; ?>
                           <?php else: ?>
                           <tr>
                              <td colspan="7" class="text-center">Job not found</td>
                           </tr>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->include('admin/common/footer') ?>


<!-- Delete Modal -->
<div class="modal fade" id="basicModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">Are you sure you want to delete this Job Listing?</div>
         <div class="modal-footer">
            <button type="button" class="btn btn-success light" data-bs-dismiss="modal">Close</button>
            <button type="button" data-id=""class="btn btn-danger confirm-delete1">Confirm</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="basicModal1">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">Are you sure you want to delete this Job Applied listing?</div>
         <div class="modal-footer">
            <button type="button" class="btn btn-success light" data-bs-dismiss="modal">Close</button>
            <button type="button" data-id=""class="btn btn-danger confirm-delete2">Confirm</button>
         </div>
      </div>
   </div>
</div>

<!-- Overlay -->
<div class="overlay"></div>

<!-- Add New Candidate Form -->
<div class="right-sidebar big" id="jobInfo">
   <div class="sliding-form">
      <?= $this->include('admin/jobs/job_info_slider') ?>
   </div>
</div>
<div class="right-sidebar big" id="addJobForm">
   <div class="sliding-form">
       <?= $this->include('admin/jobs/jobs_form') ?>
   </div>
</div>


<script>
   $(document).ready(function () {

      $('.open-add-form').click(function () {
         $('#addJobForm').addClass('show');
         $('.overlay').addClass('show');
     });
     $('.close-form, .overlay').click(function () {
         $('.right-sidebar').removeClass('show');
         $('.overlay').removeClass('show');
     });

      $('.status_update').click(function () {
         var deptId = $(this).data('id'); // Get the data-id attribute of the clicked checkbox
         // var status = $(this).value('data'); // Get the data-id attribute of the clicked checkbox
 
         $.ajax({
             type: 'POST',
             url: `<?= base_url('/admin/jobs/view/status') ?>/${deptId}`,
             success: function (response) {
                 location.reload(); // Reload the page upon successful AJAX request
             },
             error: function (xhr, status, error) {
                 // Handle any errors here
                 console.error('Error:', error);
             }
         });
     });
      $('.delete-user').click(function () {
         var deptId = $(this).data('id');
 
         // console.log(deptId);
         $('.confirm-delete1').attr('data-id', deptId);
     });
 
     $('.confirm-delete1').click(function () {
         var deptId = $(this).data('id');
 
         $.ajax({
             type: 'POST',
             url: `<?= base_url('/admin/jobs/view/delete') ?>/${deptId}`,
             success: function (response) {
               location.reload();
             }
         });
     });


     $('.open-edit-form').click(function () {
      var deptId = $(this).data('id');
      $.get(`<?= base_url('admin/jobs/view/getbyid') ?>/${deptId}`, function (data) {

          var userData =data['post'][0];
          $('#h_name1').val(userData.name);
          $('#start_time1').val(userData.start_time);
          $('#end_time1').val(userData.end_time);
          $('#job_title1').val(userData.job_title);
          $('#job_type11').val(userData.job_type);
          $('#job_description1').val(userData.job_description);
          $('#department1').val(userData.department);
          $('#sub_department1').val(userData.sub_department);
          $('#education11').val(userData.education);
          $('#experience11').val(userData.experience);
          $('#number_employees1').val(userData.number_employees);
          $('#off_salery1').val(userData.off_salery);
          $('#formTitle').text('Edit Job Data');
          $('#addJobForm').addClass('show');
          $('.overlay').addClass('show');
      });
  });

      $('.open-view-form').click(function () {

         var deptId = $(this).data('id');

         $.get(`<?= base_url('admin/jobs/view/getbyid') ?>/${deptId}`, function (data) {
            var userData = data['post'][0];
            var jobapply = data['job_apply'];
            var jobview = data['jobview'];
            $('#h_name').val(userData.name);
            $('#job_type').val(userData.job_type);
            $('#job_description').text(userData.job_description);
            $('#department').text(userData.department);
            $('#sub_department').text(userData.sub_department);
            $('#experience').html(`<span class="badge font-14 badge-warning">${userData.experience}</span>`);
            $('#education').html(`<span class="badge font-14 badge-danger">${userData.education}</span>`);
            $('#number_employees').html(`<span class="badge font-14 badge-danger">${userData.number_employees}</span>`);
            $('#off_salery').html(`<span class="badge font-14 badge-success">${userData.off_salery}</span>`);

            // Handle job application data
            if (jobapply !== null) {

               // Clear existing table rows
               $('#example3 tbody').empty();

               // Populate the table with jobapply data
               if (Array.isArray(jobapply) && jobapply.length > 0) {

                  // Populate the table with jobapply data
                  jobapply.forEach(function (item, index) {

                     var candidateInfo = `
                          <p style="    text-transform: capitalize;">
                              ${item.name} ${item.last_name}<br />
                              ${item.city}, ${item.state}<br />
                              <span style="    text-transform: capitalize;">${item.work_ex}</span><br/>
                              Mob - ${item.mobile_number}
                          </p>
                      `;

                     var appliedDate = new Date(item.created_at).toLocaleDateString();

                     var actionButtons = `
                          <div class="d-flex">
                              <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-eye"></i></a>
                              <button type="button" class="btn btn-danger shadow btn-xs sharp delete-user_ap" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#basicModal1"><i class="fa fa-trash"></i></button>
                          </div>
                      `;

                     var row = `
                          <tr>
                              <td>${index + 1}.</td>
                              <td>${candidateInfo}</td>
                              <td>${appliedDate}</td>
                              <td>${actionButtons}</td>
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

               // Clear existing table rows
               $('#exampleViewd tbody').empty();

               // Populate the table with jobapply data
               if (Array.isArray(jobview) && jobview.length > 0) {

                  // Populate the table with jobapply data
                  jobview.forEach(function (item, index) {

                     var candidateInfo = `
                          <p style="    text-transform: capitalize;">
                              ${item.name} ${item.last_name}<br />
                              ${item.city}, ${item.state}<br />
                              <span style="    text-transform: capitalize;">${item.work_ex}</span><br/>
                              Mob - ${item.mobile_number}
                          </p>
                      `;

                     var appliedDate = new Date(item.created_at).toLocaleDateString();

                     var actionButtons = `
                          <div class="d-flex">
                              <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-eye"></i></a>
                              <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                          </div>
                      `;

                     var row = `
                          <tr>
                              <td>${index + 1}.</td>
                              <td>${candidateInfo}</td>
                              <td>${appliedDate}</td>
                              <td>${actionButtons}</td>
                          </tr>
                      `;

                     $('#exampleViewd tbody').append(row);
                 
                  });
               } else {
                  
                  var emptyRow = `
                        <tr>
                            <td colspan="4">No data available</td>
                        </tr>
                    `;
                  $('#exampleViewd tbody').append(emptyRow);
               }

               // Initialize or redraw DataTables
               if (!$.fn.DataTable.isDataTable('#exampleViewd')) {
                  $('#exampleViewd').DataTable({
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
            $('#jobInfo').addClass('show');
            $('.overlay').addClass('show');
         });
      });
      $('.close-form, .overlay').click(function () {
         $('#jobInfo').removeClass('show');
         $('.overlay').removeClass('show');
      });

      $('.delete-user_ap').click(function () {
         var deptId1 = $(this).data('id');
         console.log("test",deptId);
         $('.confirm-delete1').attr('data-id', deptId1);
     });
 
     $('.confirm-delete2').click(function () {
         var deptId = $(this).data('id');
 
         $.ajax({
             type: 'POST',
             url: `<?= base_url('/admin/jobs/view/ap_delete') ?>/${deptId}`,
             success: function (response) {
               location.reload();
             }
         });
     });
   });
</script>
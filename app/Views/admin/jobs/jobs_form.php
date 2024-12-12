<form id="add-admin-form1" method="post" enctype="multipart/form-data">
    <h4 class="form-heading">Add New Job</h4>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-home me-2"></i> Job</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#education1"><i class="la la-book me-2"></i> Education</a>
            </li>
           
          
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                <div class="pt-4 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="h_name">Hotel Name</label>
                            <input type="text" name="h_name" id="h_name1" class="form-control" required>
                        </div>
                    </div>
                  
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">Start time</label>
                            <input type="date" name="start_time" id="start_time1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">End time</label>
                            <input type="date" name="end_time" id="end_time1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Job Title</label>
                            <input type="text" name="job_title" id="job_title1" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="job">Job Description</label>
                            <input type="text" name="job_description" id="job_description1" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="job">Department</label>
                            <input type="text" name="department" id="department1" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="job">Sub Department</label>
                            <input type="text" name="sub_department" id="sub_department1" class="form-control">
                        </div>
                    </div>
                   
                   
                </div>
            </div>
          
           <div class="tab-pane fade" id="education1">
                <?= $this->include('admin/jobs/edu_tab') ?>
            </div>
           
        </div>
        <div class="form-buttons mt-4">
            <button type="submit" id="form_sub1" class="btn btn-primary btn-rounded">Add Admin</button>
            <button type="button" class="btn btn-secondary btn-rounded close-form">Cancel</button>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    $('#form_sub1').click(function(e) {
        e.preventDefault(); // Prevent the default button action

        var form = $('#add-admin-form1');
        var url = 'job/save'; // Your endpoint to handle the form submission

        // Log form data before sending
        var formData = new FormData(form[0]);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
        console.log(formData);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData, // Use FormData to handle multipart/form-data
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                form.find('button[type="submit"]').prop('disabled', true).text('Saving...');
            },
            success: function(response) {
                // Handle success response
                console.log('Response:', response);
                alert('Candidate data saved successfully!');
                location.reload();
                // Optionally, you can handle any additional UI changes or redirects here
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
                alert('Error saving candidate data. Please try again.');
            },
            complete: function() {
                form.find('button[type="submit"]').prop('disabled', false).text('Add Admin'); // Reset button state
            }
        });
    });
</script>
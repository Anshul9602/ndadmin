<form id="add-admin-form" method="post" enctype="multipart/form-data" style="height:90vh;    overflow: scroll;">
    <h4 class="form-heading">Add New Candidate</h4>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-home me-2"></i> Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile1"><i class="la la-user me-2"></i> Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#education1"><i class="la la-book me-2"></i> Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#job1"><i class="la la-briefcase me-2"></i> Job Preference</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#experience1"><i class="la la-clipboard me-2"></i> Work Experience</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                <div class="pt-4 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pincode">Pincode</label>
                            <input type="text" name="pincode" id="pincode" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="reference_code">Referrel Points</label>
                            <input type="text" name="points" id="points" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile1">
                <?= $this->include('admin/candidates/profile_tab') ?>
            </div>

            <div class="tab-pane fade" id="education1">
                <?= $this->include('admin/candidates/education_tab') ?>
            </div>
            <div class="tab-pane fade" id="job1">
                <?= $this->include('admin/candidates/jobs_tab') ?>
            </div>
            <div class="tab-pane fade" id="experience1">
                <div class="pt-4">
                    <h5>Work Experience</h5>
                    <div class="form-group">
                        <label for="work_experience">Work Experience</label>
                        <textarea name="work_experience" id="work_experience" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resume">Upload Resume</label>
                        <input type="file" name="resume" id="resume" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-buttons mt-4">
            <button type="submit" id="form_sub" class="btn btn-primary btn-rounded">Add Admin</button>
            <button type="button" class="btn btn-secondary btn-rounded close-form">Cancel</button>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    $('#form_sub').click(function(e) {
        e.preventDefault(); // Prevent the default button action

        var form = $('#add-admin-form');
        var url = 'view/save'; // Your endpoint to handle the form submission

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




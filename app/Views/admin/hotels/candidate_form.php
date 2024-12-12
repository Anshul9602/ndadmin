<form id="add-admin-form" method="post" enctype="multipart/form-data">
    <h4 class="form-heading">Add New Hotel</h4>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-home me-2"></i> Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile1"><i class="la la-user me-2"></i> Profile</a>
            </li>

           
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                <div class="pt-4 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">Mobile Number</label>
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">location</label>
                            <input type="text" name="location" id="location" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">GST Number</label>
                            <input type="text" name="gst_number" id="gst_number" class="form-control" required>
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
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
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
                            <label for="pincode">Pincode</label>
                            <input type="text" name="pincode" id="pincode" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pincode">City</label>
                            <input type="text" name="city" id="city" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pincode">Country</label>
                            <input type="text" name="country" id="country" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">GST Number</label>
                            <input type="text" name="gst_number" id="gst_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">GST Name</label>
                            <input type="text" name="gst_name" id="gst_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">Reg. Email</label>
                            <input type="text" name="reg_email" id="reg_email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone_number">Reg. Hotel Address</label>
                            <input type="text" name="reg_hadd" id="reg_hadd" class="form-control" required>
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

        var form = $('#add-admin-form');
        var url = 'view/save'; // Your endpoint to handle the form submission
console.log(url); 
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


<h4 class="form-heading">Job Details</h4>
<div class="custom-tab-1">
   <ul class="nav nav-tabs">
      <li class="nav-item">
         <a class="nav-link active" data-bs-toggle="tab" href="#experience1"><i class="la la-clipboard me-2"></i> Posted Details</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="tab" href="#profile1"><i class="la la-user me-2"></i> Applied Candidates</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="tab" href="#job1"><i class="la la-briefcase me-2"></i> Viewed Candidates</a>
      </li>
   </ul>
   <br />
   <div class="tab-content">
      <div class="tab-pane fade active show" id="experience1">
         <?= $this->include('admin/jobs/job_info_table') ?>
      </div>
      <div class="tab-pane fade" id="profile1">
        <?= $this->include('admin/jobs/job_info_applied') ?>
      </div>
      <div class="tab-pane fade" id="job1">
        <?= $this->include('admin/jobs/job_info_viewed') ?>
      </div>
   </div>
</div>
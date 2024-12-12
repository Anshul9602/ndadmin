
<?= $this->include('admin/common/header') ?>

<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>Dashboard</span>
                        </div>
                    </div>
                    <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">1230</h5>
												<span class="text-success">Total Tasks Assiged</span>
											</div>
										</div>
									</div>
									<div class="chart-wrapper">
										<canvas id="areaChart_2" class="chartjs-render-monitor" height="90"></canvas>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card bg-success	overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col">
												<h5 class="text-white mb-1">38</h5>
												<span class="text-white">Total Sheets</span>
											</div>
										</div>
									</div>
									<div class="chart-wrapper" style="width:100%">
										<span class="peity-line" data-width="100%">6,2,8,4,3,8,4,3,6,5,9,2</span>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card bg-primary overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col text-white">
												<h5 class="text-white mb-1">13</h5>
												<span>New Tasks</span>
											</div>
										</div>
									</div>
									<div class="chart-wrapper px-2">
										<canvas id="chart_widget_2" height="100"></canvas>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body px-4 py-4">
										<h5 class="mb-3">1590 / <small class="text-primary">Task Status</small></h5>
										<div class="chart-point">
											<div class="check-point-area">
												<canvas id="ShareProfit2"></canvas>
											</div>
											<ul class="chart-point-list">
												<li><i class="fa fa-circle text-primary mr-1"></i> 40% Completed</li>
												<li><i class="fa fa-circle text-success mr-1"></i> 35% Pending</li>
												<li><i class="fa fa-circle text-warning mr-1"></i> 25% Delayed</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Timeline</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1" style="height:250px;">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="#">
														<span>10 minutes ago</span>
														<h6 class="mb-0">New Order Placed <strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New purchase order placed <strong class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>15 minutes ago</span>
														<h6 class="mb-0">Lorem ipsum dolor sit amet. </h6>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-xxl-8 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Task Assiged to me</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
														
														<th><strong>NAME</strong></th>
														<th><strong>DATE</strong></th>
														<th><strong>STATUS</strong></th>
														<th style="width:85px;"><strong>EDIT</strong></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
													
														<td>Dr. Jackson</td>
														<td>01 August 2021</td>
														<td class="recent-stats d-flex align-items-center"><i class="fa fa-circle text-success mr-1"></i>Successful</td>
														<td>
															<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
															<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
																<label class="custom-control-label" for="customCheckBox3"></label>
															</div>
														</td>
														
														<td>Dr. Jackson</td>
														<td>01 August 2021</td>
														<td class="recent-stats d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i>Canceled</td>
														<td>
															<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
															<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
																<label class="custom-control-label" for="customCheckBox4"></label>
															</div>
														</td>
														
														<td>Dr. Jackson</td>
														<td>01 August 2021</td>
														<td class="recent-stats d-flex align-items-center"><i class="fa fa-circle text-warning mr-1"></i>Pending</td>
														<td>
															<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
															<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
																<label class="custom-control-label" for="customCheckBox5"></label>
															</div>
														</td>
														
														<td>Dr. Jackson</td>
														<td>01 August 2021</td>
														<td class="recent-stats d-flex align-items-center"><i class="fa fa-circle text-danger mr-1"></i>Canceled</td>
														<td>
															<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
															<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			   </div>
              
            </div>
           
        </div>
       
    </div>
<?= $this->include('admin/common/footer') ?>
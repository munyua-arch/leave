<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('backend/admin-layouts'); ?>
<?= $this->section('content'); ?>

				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Declined History</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url().'admindashboard/'?>">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Declined List
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<?php if($page_session->has('delete_success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $page_session->get('delete_success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php endif;?>


					<!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Declined History</h4>
						</div>

						<div class="pb-20">

							<?php if(count($declined)): ?>
								<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">#</th>
										<th>Full Name</th>
										<th>Leave Type</th>
										<th>Applied On</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Declined On</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
									
								<?php foreach($declined as $dec): ?>
									<tr>
										<td class="table-plus"><?= $dec['id']?></td>
										<td><?= $dec['name']?></td>
										<td><?= $dec['leave_type']?></td>
										<td><?= date('l d M Y', strtotime($dec['applied_on']))?></td>
										<td><?= date('l d M Y', strtotime($dec['start_date']))?></td>
										<td><?= date('l d M Y', strtotime($dec['end_date']))?></td>
										<td><?= date('l d M Y ', strtotime($dec['declined_timestamp']))?></td>
										<td class="text-danger	">
											Declined
											<i class="icon-copy bi bi-x-octagon-fill"></i>
										</td>
										
									</tr>
								<?php endforeach; ?>

								</tbody>
							</table>
							<?php endif;?>

							<!-- pager links -->
							<div class="d-flex">
								<?= $pager->links();?>
							</div>



						</div>
					</div>
					<!-- Simple Datatable End -->
					


    
<?= $this->endSection(); ?>
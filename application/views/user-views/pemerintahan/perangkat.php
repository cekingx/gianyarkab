<title><?php echo $title;?></title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class=" container">
		<!--begin::Row-->
		<div class="row">
			<div class="col-xl-9">
				<!--begin::Card-->
				<div class="card card-custom">
					<div class="card-header flex-wrap border-0 pt-6 pb-0">
						<div class="card-title">
							<h3 class="card-label">
							<?php echo $title;?>
								<!-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized
												from HTML table</span> -->
							</h3>
						</div>

					</div>
					<div class="card-body">
						
					</div>

				</div>
				<!--end::Card-->

			</div>

			<?php $this->load->view('layouts/partials/side.php'); ?>

		</div>
		<!--end::Row-->

	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
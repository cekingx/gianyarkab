
<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">

						<!--begin::Logo-->
						<a href="index.html" class="brand-logo">
							<img alt="Logo" src="<?= base_url('assets/admin-assets/media/logos/pemkab.png') ?>" />
						</a>

						<!--end::Logo-->
					</div>

					<!--end::Brand-->

					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<!-- begin::Beranda -->
								<li class="menu-section">
									<h4 class="menu-text">Beranda</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- end::Beranda -->
								<!-- begin::Pengumuman -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'pengumuman') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/pengumuman') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-speaker"></i></span>
										<span class="menu-text">Pengumuman</span>
									</a>
								</li>
								<li class="menu-item <?php if($this->uri->segment(2) == 'banner') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/banner') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon-tabs"></i></span>
										<span class="menu-text">Banner Acara</span>
									</a>
								</li>
								<!-- end::Pengumuman -->
								<!-- begin::Pemerintahan -->
								<li class="menu-section">
									<h4 class="menu-text">Pemerintahan</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- end::Pemerintahan -->
								<!-- begin::Alamat Instansi -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'alamat-instansi') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/alamat-instansi') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-location"></i></span>
										<span class="menu-text">Alamat Instansi</span>
									</a>
								</li>
								<!-- end::Alamat Instansi -->
								<!-- begin::Sub Domain -->
								<li class="menu-section">
									<h4 class="menu-text">Sub Domain</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- end::Pemerintahan -->
								<!-- begin::Alamat Instansi -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'subdomain') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/subdomain') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-website"></i></span>
										<span class="menu-text">Sub Domain</span>
									</a>
								</li>
								<!-- end::Sub Domain -->
							</ul>

							<!--end::Menu Nav-->
						</div>

						<!--end::Menu Container-->
					</div>

					<!--end::Aside Menu-->
				</div>

				<!--end::Aside-->
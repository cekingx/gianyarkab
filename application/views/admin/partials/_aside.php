
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
								<li class="menu-section">
									<h4 class="menu-text">Beranda</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- begin::Pengumuman -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'pengumuman') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/pengumuman') ?>" class="menu-link">
										<!-- <span class="svg-icon menu-icon"> -->
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-25-063451/theme/html/demo1/dist/../src/media/svg/icons/Devices/Mic.svg-->
											<!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M12.9975507,17.929461 C12.9991745,17.9527631 13,17.9762852 13,18 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,18 C11,17.9762852 11.0008255,17.9527631 11.0024493,17.929461 C7.60896116,17.4452857 5,14.5273206 5,11 L7,11 C7,13.7614237 9.23857625,16 12,16 C14.7614237,16 17,13.7614237 17,11 L19,11 C19,14.5273206 16.3910388,17.4452857 12.9975507,17.929461 Z" fill="#000000" fill-rule="nonzero"/>
													<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-360.000000) translate(-12.000000, -8.000000) " x="9" y="2" width="6" height="12" rx="3"/>
												</g>
											</svg> -->
											<!--end::Svg Icon-->
										<!-- </span> -->
										<span class="menu-icon"><i class="flaticon2-speaker"></i></span>
										<span class="menu-text">Pengumuman</span>
									</a>
								</li>
								<!-- end::Pengumuman -->
							</ul>

							<!--end::Menu Nav-->
						</div>

						<!--end::Menu Container-->
					</div>

					<!--end::Aside Menu-->
				</div>

				<!--end::Aside-->

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
								<!-- begin::dashboard -->
								<li class="menu-item <?php if($this->uri->segment(2) == '') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-menu-2 <?php if($this->uri->segment(2) == '') : ?>text-success<?php endif; ?>"></i></span>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<!-- end::dashboard -->
								<!-- begin::foto&video -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'galeri') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/galeri') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-photograph"></i></span>
										<span class="menu-text">Galeri</span>
									</a>
								</li>
								<!-- end::foto&video -->
								<!-- begin::kritik_saran -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'kritik-saran') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/kritik-saran') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-speaker"></i></span>
										<span class="menu-text">Kritik Saran</span>
									</a>
								</li>
								<!-- end::kritik_saran -->

								<!-- begin::Beranda -->
								<li class="menu-section">
									<h4 class="menu-text">Beranda</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
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
								<li class="menu-item <?php if($this->uri->segment(2) == 'kegiatan') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/kegiatan') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon-event-calendar-symbol"></i></span>
										<span class="menu-text">Kegiatan</span>
									</a>
								</li>
								<!-- end::Pengumuman -->
								<!-- end::Beranda -->
								<!-- begin::Profile -->
								<li class="menu-section">
									<h4 class="menu-text">Profile</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- begin::Jabatan Bupati -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'jabatan-bupati') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/jabatan-bupati') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-speaker"></i></span>
										<span class="menu-text">Bupati Masa ke Masa</span>
									</a>
								</li>
								<!-- end::Jabatan Bupati -->
								<!-- end::Profile -->
								<!-- begin::Pemerintahan -->
								<li class="menu-section">
									<h4 class="menu-text">Pemerintahan</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- begin::Alamat Instansi -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'alamat-instansi') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/alamat-instansi') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-location"></i></span>
										<span class="menu-text">Alamat Instansi</span>
									</a>
								</li>
								<!-- end::Alamat Instansi -->
								<!-- begin::laporan -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'laporan') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/laporan') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-open-text-book"></i></span>
										<span class="menu-text">Laporan</span>
									</a>
								</li>
								<!-- end::laporan -->
								<!-- end::Pemerintahan -->
								<!-- begin::Sub Domain -->
								<li class="menu-section">
									<h4 class="menu-text">Sub Domain</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item <?php if($this->uri->segment(2) == 'subdomain') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/subdomain') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-website"></i></span>
										<span class="menu-text">Sub Domain</span>
									</a>
								</li>
								<!-- end::Sub Domain -->
								<!-- begin::infogianyar -->
								<li class="menu-section">
									<h4 class="menu-text">Info Gianyar</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<!-- begin::Artikel berita -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'artikel_berita') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/artikel_berita') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon-notes"></i></span>
										<span class="menu-text">Artikel dan Berita</span>
									</a>
								</li>
								<!-- end::Artikel berita -->
								<!-- begin::media cetak -->
								<li class="menu-item <?php if($this->uri->segment(2) == 'media_cetak') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/artikel_berita') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-paper"></i></span>
										<span class="menu-text">Media Cetak</span>
									</a>
								</li>
								<!-- end::media cetak -->
								<!-- end::infogianyar -->
								<!-- begin::Kontak -->
								<li class="menu-section">
									<h4 class="menu-text">Kontak</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item <?php if($this->uri->segment(2) == 'kontak') : ?>menu-item-active<?php endif; ?>" aria-haspopup="true">
									<a href="<?= site_url('/admin/kontak') ?>" class="menu-link">
										<span class="menu-icon"><i class="flaticon2-website"></i></span>
										<span class="menu-text">Kontak dan Pesan</span>
									</a>
								</li>
								<!-- end::Kontak -->
							</ul>

							<!--end::Menu Nav-->
						</div>

						<!--end::Menu Container-->
					</div>

					<!--end::Aside Menu-->
				</div>

				<!--end::Aside-->
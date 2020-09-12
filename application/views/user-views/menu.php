<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png') ?>" />

	<title>Website Resmi Pemerintahan Kabupaten Gianyar</title>
	<!-- Styles -->

	<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css?v=7.0.6') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') ?>" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url('assets/menus/semantic.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/menus/landing-page.css') ?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />


</head>

<body style="padding-top: 0px;">
	<!-- Page Contents -->
	<div id="app" class="pusher">
		<div class="logo">
			<img src="<?= base_url('assets/img/profile/polres.png') ?>" class="compact">
		</div>

		<div class="ui container">
			

			<div class='search-bo'>
				<input class="search-tex" type="text" placeholder="Cari Sesuatu">
				<a href="#" class="search-bt">
					<i class="fas fa-search"></i>
				</a>

			</div>
		</div>
		<div class="container">
			<div class="menu-bar row">
				<ul id="menu">
					<li class="menubar parent">
						<a class="" data-parent="#menu" href="#1" data-toggle="collapse"><img
								src="<?= base_url('assets/img/profile/pemerintah.png') ?>" alt=""></a>

						<span class="title">PEMERINTAH</span>
					</li>
					<div id="1" class="content collapse column-full">
						<div class="well">
							<ul id="submenu">
								<!-- yang perlu, struktur organisasi -->
							 	<li class=""><a target="_blank" href="struktur organisasi">Struktur Organisasi</a></li>
								<li class=""><a target="_blank" href="http://lkjip.gianyarkab.go.id/">Laporan Kinerja Instansi Pemerintahan</a></li>
								<li class=""><a target="_blank" href="http://www.gianyarkab.go.id/arsip-transparansi_keuangan">Transparansi Pengelolaan Keuangan Daerah</a></li>
								<li class=""><a target="_blank" href="http://monev.lkpp.go.id/tepra/summary?instansi=D31">TEPRA</a></li>
								<li class=""><a target="_blank" href="https://sirup.lkpp.go.id/sirup/rekapKldi/D31">Rencana Umum Pengadaan</a></li>
								<li class=""><a target="_blank" href="http://gplan.gianyarkab.go.id/">E-Planning</a></li>
								<li class=""><a target="_blank" href="http://gplan.gianyarkab.go.id/simdaperencanaan">SIMDA Perencanaan</a></li>
								<li class=""><a target="_blank" href="http://jdih.gianyarkab.go.id/">Jaringan Dokumentasi dan Informasi Hukum (JDIH)</a></li>

							</ul>
						</div>
					</div>
					<li class="menubar parent">
						<a class="" data-parent="#menu" href="#2" data-toggle="collapse"><img
								src="<?= base_url('assets/img/profile/layanan.png') ?>" alt=""></a>
						<span class="title">LAYANAN PUBLIK</span>
					</li>
					<div id="2" class="content collapse column-full">
						<div class="well">
							<ul id="submenu">
								<li class=""><a target="_blank" href="http://disdukcapil.gianyarkab.go.id/">Administrasi Kependudukan</a></li>
								<li class=""><a target="_blank" href="http://dpmptsp.gianyarkab.go.id/produk/162/Pelayanan-Perijinan">Pelayanan Perijinan</a></li>
								<li class=""><a target="_blank" href="http://lpse.gianyarkab.go.id/">Layanan Pengadaan Secara Elektronik</a></li>
								<li class=""><a target="_blank" href="http://e-sptpd.gianyarkab.go.id/wp/">e-Surat Pemberitahuan Pajak Daerah</a></li>
								<li class=""><a target="_blank" href="http://www.bursakerjagianyar.com/">Bursa Kerja</a></li>
								<li class=""><a target="_blank" href="http://dispusar.gianyarkab.go.id/">Online Public Access Catalog (OPAC) Pepustakaan Gianyar</a>
								</li>
							</ul>
						</div>
					</div>
					<li class="menubar parent">
						<a class="" data-parent="#menu" href="#3" data-toggle="collapse"><img
								src="<?= base_url('assets/img/profile/info.png') ?>" alt=""></a>
						<span class="title">INFO GIANYAR</span>
					</li>
					<div id="3" class="content collapse column-full">
						<div class="well">
							<ul id="submenu">

							<!-- yang oerlu berita, pengumuman, agenda kegiatan -->
								<li class=""><a target="_blank" href="berita">Berita</a></li>
								<li class=""><a target="_blank" href="pengumuman">Pengumuman</a></li>
								<li class=""><a target="_blank" href="agenda kegiatan">Agenda Kegiatan</a></li>
							</ul>
						</div>
					</div>

					<li class="menubar">
						<a class="" target="_blank" href="https://www.lapor.go.id/"><img src="<?= base_url('assets/img/profile/lapor.png') ?>" alt=""></a>
						<span class="title">LAPOR!</span>
					</li>
					<li class="menubar">
						<a class="" target="_blank" href="https://www.jaga.id/"><img src="<?= base_url('assets/img/profile/jaga.png') ?>" alt=""></a>
						<span class="title">JAGA</span>
					</li>
					<li class="menubar">
						<a class="" target="_blank" href="http://atcs.gianyarkab.go.id/"><img
								src="<?= base_url('assets/img/profile/cctv.png') ?>" alt=""></a>
						<span class="title">LIVE CONTROL</span>
					</li>

					<li class="menubar parent">
						<a class="" data-parent="#menu" href="#4" data-toggle="collapse"><img
								src="<?= base_url('assets/img/profile/web2.png') ?>" alt=""></a>
						<span class="title">WEBSITE OPD</span>
					</li>
					<div id="4" class="content collapse column-full">
						<div class="well">
							<ul id="submenu">
								<li class=""><a target="_blank" href="http://dprd-gianyarkab.go.id/">DPRD</a></li>
								<li class=""><a target="_blank" href="http://inspektorat.gianyarkab.go.id/">Inspektorat</a></li>
								<li class=""><a target="_blank" href="http://bappeda.gianyarkab.go.id/">Badan Perencanaan Pembangunan Derah dan Litbang</a></li>
								<li class=""><a target="_blank" href="http://bpkad.gianyarkab.go.id/">Badan Pengelolaan Keuangan dan Aset Daerah</a></li>
								<li class=""><a target="_blank" href="http://bkpsdm.gianyarkab.go.id/">Badan Kepegwaian dan Pengembangan SDM</a></li>
								<li class=""><a target="_blank" href="http://dinaspmd.gianyarkab.go.id/">Dinas Pemberdayaan Masyarakat dan Desa</a></li>
								<li class=""><a target="_blank" href="http://dp3ap2kb.gianyarkab.go.id/">Dinas Pemberdayaan Perempuan dan Perlindungan Anak,
										Pengendalian Perempuan dan Keluarga Berencana</a></li>
								<li class=""><a target="_blank" href="http://dpmptsp.gianyarkab.go.id/">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</a>
								</li>
								<li class=""><a target="_blank" href="http://disdik.gianyarkab.go.id/">Dinas Pendidikan</a></li>
								<li class=""><a target="_blank" href="http://dispusarsip.gianyarkab.go.id/">Berita</a></li>
								<li class=""><a target="_blank" href="http://dispusarsip.gianyarkab.go.id/">Dinas Perpustakaan dan Kearsipan</a></li>
								<li class=""><a target="_blank" href="http://distan.gianyarkab.go.id/">Dinas Pertanian</a></li>
								<li class=""><a target="_blank" href="http://dinsos.gianyarkab.go.id/">Dinas Sosial</a></li>
								<li class=""><a target="_blank" href="http://disbud.gianyarkab.go.id/">Dinas Kebudayaan</a></li>
								<li class=""><a target="_blank" href="http://disdukcapil.gianyarkab.go.id/">Dinas Kependudukan dan Pencatatan Sipil</a></li>
								<li class=""><a target="_blank" href="http://dinkes-gianyarkab.info/">Dinas Kesehatan</a></li>
								<li class=""><a target="_blank" href="http://diskominfo.gianyarkab.go.id/">Dinas Komunikasi dan Informatika</a></li>
								<li class=""><a target="_blank" href="http://diskop.gianyarkab.go.id/">Dinas Koperasi, Usaha Kecil dan Menengah</a></li>
								<li class=""><a target="_blank" href="http://diparda.gianyarkab.go.id/">Dinas Pariwisata</a></li>
								<li class=""><a target="_blank" href="http://dpupr.gianyarkab.go.id/">Dinas Pekerjaan Umum dan Penataan Ruang</a></li>
								<li class=""><a target="_blank" href="http://rsudsanjiwani.gianyarkab.go.id/">Rumah Sakit Umum Daerah SANJIWANI Gianyar</a></li>
								<li class=""><a target="_blank" href="https://puskesmaspayangan.com/">Puskesmas Payangan</a></li>
								<li class=""><a target="_blank" href="http://pdamgianyar.co.id/">PDAM</a></li>

								<li class=""><a target="_blank" href="http://www.werdhisedana.co.id/">PD. BPR. Werdhi Sedana</a></li>
								<li class=""><a target="_blank" href="http://perumda.gianyarkab.go.id/">Perumda Gianyar</a></li>
							</ul>
						</div>
					</div>
					<li class="menubar parent">
						<a class="" data-parent="#menu" href="#5" data-toggle="collapse"><img
								src="<?= base_url('assets/img/profile/pin2.png') ?>" alt=""></a>
						<span class="title">Seputar Desa</span>
					</li>
					<div id="5" class="content collapse column-full">
						<div class="well">
							<ul id="submenu">
								<li class=""><a target="_blank" href="http://batuan.desa.id/">Desa Batuan</a></li>
								<li class=""><a target="_blank" href="http://gianyarbedulu.desa.kemendesa.go.id/">Desa Bedulu</a></li>
								<li class=""><a target="_blank" href="http://belega.id/">Desa Belega</a></li>
								<li class=""><a target="_blank" href="http://www.desabona.id/">Desa Bona</a></li>
								<li class=""><a target="_blank" href="http://desabukian.zeta.co.id/">Desa Bukian</a></li>
								<li class=""><a target="_blank" href="http://kerta.desa.id/">Desa Kerta</a></li>
								<li class=""><a target="_blank" href="http://lebih.gianyarkab.go.id/">Desa Lebih</a></li>

								<li class=""><a target="_blank" href="https://desa-mas.com/">Desa Mas</a></li>
								<li class=""><a target="_blank" href="http://desamelinggih.zeta.co.id/">Desa Melinggih</a></li>
								<li class=""><a target="_blank" href="http://www.pejeng.desa.id/">Desa Pejeng</a></li>
								<li class=""><a target="_blank" href="http://pejengkangin.desa.id/">Desa Pejeng Kangin</a></li>
								<li class=""><a target="_blank" href="https://peliatan.id/">Desa Peliatan</a></li>
								<li class=""><a target="_blank" href="http://gianyarsaba.desa.kemendesa.go.id/">Desa Saba</a></li>
								<li class=""><a target="_blank" href="https://desatampaksiring.com/">Desa Tampaksiring</a></li>
								<li class=""><a target="_blank" href="http://taro.desa.id/">Desa Taro</a></li>
								<li class=""><a target="_blank" href="http://kelurahan-beng.com/">Kelurahan Beng</a></li>
								<li class=""><a target="_blank" href="http://kelurahanubud.gianyarkab.go.id/">Kelurahan Ubud</a></li>
							</ul>
						</div>
					</div>
				</ul>
			</div>
		</div>
		<p class="clear"></p>
		<br>
		<div class="ui container center aligned">
			<!-- ubah ke index -->
			<a target="_blank" href="<?= base_url('home')?>" class="huge ui white basic button very padded" target="_blank">BERANDA
			</a>
		</div>
		<br>
		<div class="ui divider hidden"></div>
		<div class="ui divider hidden"></div>
		<div class="ui divider hidden"></div>
	</div>

	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/menus/collapse.js') ?>"></script>
	<script type="text/javascript">
		$('.menubar.parent').click(function () {

			if (!$(this).next().hasClass('in')) {
				$('.content.column-full').removeClass('in');
				$('.content.column-full').prop('aria-expanded', false);
			}

			// const mq = window.;
			if (matchMedia("(max-width: 500px)").matches) {
				a = parseInt($(this).position().left);
			} else {
				a = parseInt($(this).position().left) - 30;
			}

		});
		$(window).scroll(function () {
			$(".menubar.shrink").show();
			if (matchMedia("(max-width: 500px)").matches) {
				if ($(window).scrollTop() >= 80) {
					$(".menubar.shrink").hide();
				}
			} else {
				if ($(window).scrollTop() >= 100) {
					$(".menubar.shrink").hide();
				}
			}
		});
	</script>
</body>

</html>
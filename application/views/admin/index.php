<!DOCTYPE html>

<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!--begin::Head-->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />

		<?php $this->load->view('admin/css.php') ?>
		<?php $this->load->view('admin/js.php') ?>
	</head>

	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class=" header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

		<!--[html-partial:include:{"file":"partials/_page-loader.html"}]/-->
		<?php $this->load->view('admin/partials/_page-loader.php') ?>

		<!--[html-partial:include:{"file":"layout.html"}]/-->
		<?php $this->load->view('admin/layout.php') ?>

		<title>Metronic Live preview | Keenthemes</title>
		<!--[html-partial:include:{"file":"partials/_extras/scrolltop.html"}]/-->
		<?php $this->load->view('admin/partials/_extras/scrolltop.php') ?>

	</body>

	<!--end::Body-->
</html>
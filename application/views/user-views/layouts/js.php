<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?php echo base_url('assets/user-assets/plugins/global/plugins.bundle.js') ?>"></script>
<script src="<?php echo base_url('assets/user-assets/plugins/custom/prismjs/prismjs.bundle.js') ?>"></script>
<script src="<?php echo base_url('assets/user-assets/js/scripts.bundle.js') ?>"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo base_url('assets/user-assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') ?>"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo base_url('assets/user-assets/js/pages/widgets.js') ?>"></script>
<script src="<?php echo base_url('assets/user-assets/js/bootbox.min.js') ?>"></script>
<script src="<?php echo base_url('assets/user-assets/js/pages/widgets.js?v=7.0.6') ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script>
<!-- end::Page Scripts-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v8.0"
    nonce="BAWXgPnr"></script>

<script src="<?= base_url('assets/js/pages/crud/file-upload/dropzonejs.js?v=7.0.6') ?>"></script>

<!-- Leaflet (JS/CSS) -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>

<!-- Leaflet-Pointable -->
<script src="https://unpkg.com/leaflet-pointable@0.0.3/leaflet-pointable.js"></script>

<!-- Leaflet-KMZ -->
<script src="https://unpkg.com/leaflet-kmz@0.3.0/dist/leaflet-kmz.js"></script>

<!-- detail foto -->
<script src="<?= base_url('assets/user-assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/popper.min.js') ?>"></script>
<!-- <script src="assets/js/bootstrap.min.js"></script> -->
<script src="<?= base_url('assets/user-assets/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/jquery.stellar.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/jquery.countdown.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/aos.js') ?>"></script>

<script src="<?= base_url('assets/user-assets/js/jquery.fancybox.min.js') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/main.js') ?>"></script>

<!-- detail video -->
<script type='text/javascript' src='<?= base_url('unitegallery/js/jquery-11.0.min.js') ?>'></script>
<script type='text/javascript' src='<?= base_url('unitegallery/js/unitegallery.min.js') ?>'></script>
<script type='text/javascript' src='<?= base_url('unitegallery/themes/default/ug-theme-default.js') ?>'></script>

<link rel='stylesheet' href='<?= base_url('unitegallery/css/unite-gallery.css') ?>' type='text/css' />
<link rel='stylesheet' href='<?= base_url('unitegallery/themes/default/ug-theme-default.css') ?>' type='text/css' />



<!-- ticker -->
<!-- <script type="text/javascript" src="assets/js/ticker/jquery.js"></script> -->
<script type="text/javascript" src="<?= base_url('assets/user-assets/js/ticker/jquery.vticker-min.js') ?>"></script>

<!-- data tables -->
<script type='text/javascript' src='https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js'></script>
<script type='text/javascript' src='https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js'>
</script>
<script type='text/javascript' src='https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js'>
</script>

<!--begin::Page Scripts(used by this page)-->
<script src="<?= base_url('assets/user-assets/js/pages/widgets.js?v=7.0.6') ?>"></script>
<script src="<?= base_url('assets/user-assets/js/pages/custom/profile/profile.js?v=7.0.6') ?>"></script>
<!--end::Page Scripts -->

<!-- sharerr -->
<script type='text/javascript' src="https://cdn.jsdelivr.net/sharer.js/latest/sharer.min.js"></script>
<html lang="en">
<!--begin::Head-->
<head>
    <title>Sign In | SKM Kab. Gianyar</title>
    <?php $this->load->view('layouts/css.php'); ?>
    <?php $this->load->view('layouts/js.php'); ?>
    <style>
        #anim {
            position:absolute;top:-250;z-index:0;width:50%;text-align:center;left: 50%; transform: translate(-50%,0);
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen 
        and (min-device-width : 320px) 
        and (max-device-width : 480px) {
            #anim {
                position:absolute;right:0;top:-30;z-index:0;width:100%;
            }
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(assets/img/bg-login.png); background-size:cover;" class="quick-panel-right demo-panel-right offcanvas-right header-fixed page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile position:absolute;right:0;top:80;z-index:0;width:200px;-->
    <div class="preloader">
        <div class="loading">
            <img src="<?php echo base_url('assets/img/loader.gif') ?>" width="80">
        </div>
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
    <img id="anim" src="<?php echo base_url('assets/img/anim-1.png')?>">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <?php $this->load->view($content) ?>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
</body>
<!--end::Body-->
</html>
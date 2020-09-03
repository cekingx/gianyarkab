<html lang="en">
<!--begin::Head-->

<head>

    <?php $this->load->view('user-views/layouts/css.php'); ?>
    <?php $this->load->view('user-views/layouts/js.php'); ?>
    <style>
        #anim {
            position: absolute;
            right: 100;
            top: 80;
            z-index: 0;
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            #anim {
                position: absolute;
                right: 0;
                top: 80;
                z-index: 0;
                width: 200px;
            }
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?= base_url('assets/user-assets/img/bgtop.png') ?>); background-size: 100%;"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile position:absolute;right:0;top:80;z-index:0;width:200px;-->


    <!-- <img id="anim" src="<?php echo base_url('assets/user-assets/img/anim-1.png')?>"> -->
    <div id="kt_header_mobile" class="header-mobile">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo"
                src="<?php echo base_url('assets/user-assets/img/profile/polres.png')?><?php echo $this->session->userdata('instansi_logo')?>"
                class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <?php $this->load->view('user-views/layouts/partials/header') ?>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <?php $this->load->view($content) ?>
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <?php $this->load->view('user-views/layouts/partials/footer') ?>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->

</body>
<script>
    // alert("https://api.countapi.xyz/hit/"+$(location).attr("href").split('/').pop())
    const countEl = document.getElementById('count');
    updateVisitCount();

    function updateVisitCount() {
        $.ajax({
            url: "https://api.countapi.xyz/hit/nilaarta" + $(location).attr("href").split('/').pop(),
            type: "get",
            dataType: 'json',
            success: function (response) {
                console.log('ressssssss', response)
                $('#count').html(response.value)
                // You will get response from your PHP page (what you echo or print)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function formatTextDate (date_string, id) {
    
    var d_names = ["Minggu", "Senen", "Selasa",
    "Rabu", "Kamis", "Jumat", "Sabtu"];
    
    var m_names = ["Januari", "Februari", "Maret", 
    "April", "Mei", "Juni", "Juli", "Augustus", "September", 
    "Oktober", "November", "Desember"];
    
    var dateArray = date_string.split("-"); //Need to convert to Array to get to work in all browsers. Example format: Year, month, day: 2013-06-18
    var d = new Date(dateArray[0],dateArray[1]-1,dateArray[2]); //Subtract 1 from the month because it is 0-11
    var s_day = d.getDay();
    var s_date = d.getDate();
    var sup = ""; //To add superscript text to date.
    var s_month = d.getMonth();
    var s_year = d.getFullYear();
    
    //Following code is optional for adding a superscript to the day of the week
    
    if (s_date == 1 || s_date == 21 || s_date ==31)
        {
        sup = "st";
        }
    else if (s_date == 2 || s_date == 22)
        {
        sup = "nd";
        }
    else if (s_date == 3 || s_date == 23)
        {
        sup = "rd";
        }
    else
        {
        sup = "th";
        }
        
        // Example of "sup": document.write(d_names[s_day] + ", " + m_names[s_month] + " " + s_date + sup + ", " + s_year);
    
    var output_date = d_names[s_day] + ", " + s_date + " " + m_names[s_month] + " " + s_year;
        
    //console.log(output_date);
    
    // Pass the string to an element by ID or to a text input by ID
        if (document.getElementById) {
            x = document.getElementById(id);
        } 
            else if (document.all) //For IE Support
        {
            x = document.all[id];  
        }
    
        if(x.tagName && x.tagName.toLowerCase() == "input" && x.type.toLowerCase() == "text") { //Check if this is a text input
            console.log('this is a text input');
            x.value = '';
            x.value = output_date;
        } else { //Else this is an element
            console.log('this is an element');
            x.innerHTML = '';
            x.innerHTML = output_date;
        }
    
    }
    
    var span_Text = document.getElementById("display-date").innerText;
    
    formatTextDate(span_Text,"display-date");
    formatTextDate("2013-12-22","display-date2");

</script>
<!--end::Body-->

</html>
<?php
    $ucapan_perayaan = $this->ucapan_perayaan_model->getAll();
?>
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-3">
            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="<?php echo site_url('/') ?>">
                    <img alt="Logo"
                        src="<?php echo base_url('assets/img/profile/polres.png')?><?php echo $this->session->userdata('instansi_logo')?>"
                        class="logo-default max-h-40px" />
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Header Menu Wrapper-->
            <?php $this->load->view('user-views/layouts/partials/menu') ?>
            <!--end::Header Menu Wrapper-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Search-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span> </div>
                </div>
                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                        <!--begin:Form-->
                        <form method="get" class="quick-search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span> </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search..." />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->

                        <!--begin::Scroll-->
                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325"
                            data-mobile-height="200">
                        </div>
                        <!--end::Scroll-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Search-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div id="news-container1" style="overflow: hidden; position: relative; width: 60%;">
            <ul>
                <?php foreach($ucapan_perayaan as $ucapan_perayaan): ?>
                <li style="margin: 0pt; padding: 0pt; height: 100%; display: list-item;">
                    <h1 class="text-white" style="margin: 0pt; padding: 0pt;">
                        <?= $ucapan_perayaan['ucapan_perayaan_teks'] ?>
                    </h1>
                </li>
                <?php endforeach; ?>
                <!-- <li style="margin: 0pt; padding: 0pt; height: 100%; display: list-item;">
                    <h1 class="text-white" style="margin: 0pt; padding: 0pt;">
                        Selamat Ulang Tahun Indonesia Ke75 Selamat Ulang Tahun Indonesia Ke75
                    </h1>
                </li>
                <li style="margin: 0pt; padding: 0pt; height: 100%; display: list-item;">
                    <h1 class="text-white" style="margin: 0pt; padding: 0pt;">
                        Selamat Ulang Gianyar
                    </h1>
                </li> -->
            </ul>
        </div>

        <!--end::Info-->

        <!--begin::Heading-->
        <div class="d-flex flex-column">
            <div class="wrapper">
                <div id="date" class="text-white text-hover-white opacity-75 hover-opacity-100"></div>
                <div id="time" class="text-white text-hover-white opacity-75 hover-opacity-100"></div>
            </div>
        </div>
        <!--end::Heading-->
    </div>
</div>
<!--end::Subheader-->

<script type="text/javascript">
    $(function () {
        $('#news-container').vTicker({
            speed: 500,
            pause: 3000,
            animation: 'fade',
            mousePause: false,
            showItems: 3
        });
        $('#news-container1').vTicker({
            speed: 700,
            pause: 4000,
            animation: 'fade',
            mousePause: false,
            showItems: 1
        });
    });
    (function () {
        'use strict';

        function getDate() {
            var date = new Date();
            var weekday = date.getDay();
            var month = date.getMonth();
            var day = date.getDate();
            var year = date.getFullYear();
            var hour = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            if (hour < 10) hour = "0" + hour;
            if (minutes < 10) minutes = "0" + minutes;
            if (seconds < 10) seconds = "0" + seconds;

            var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Augustus", "September",
                "Oktober", "November", "Desember"
            ];

            var weekdayNames = ["Minggu", "Senen", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            var monthColors = ["#1E90FF", "#FF69B4", "#00FFFF", "#7CFC00", "#00CED1", "#FF1493", "#00008B",
                "#FF7F50", "#C71585", "#FF4500", "#FFD700", "#800000"
            ]

            var ampm = " pm ";

            if (hour < 12) ampm = " am ";

            if (hour > 12) hour -= 12;

            var showDate = weekdayNames[weekday] + ", " + day + " " + monthNames[month] + " " + year;

            var showTime = hour + ":" + minutes + ":" + seconds + ampm;

            var color = monthColors[month];

            document.getElementById('date').innerHTML = showDate;

            document.getElementById('time').innerHTML = showTime;

            document.bgColor = color;


            requestAnimationFrame(getDate);
        }

        getDate();

    }());
</script>


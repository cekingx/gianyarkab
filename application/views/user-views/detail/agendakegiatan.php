<title><?= $title ?></title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Detail Agenda Kegiatan
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="h1 text-center"><?= $title ?></div>
                    </div>

                    <!--begin::Footer-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        <!--begin::Container-->
                        <div
                            class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-dark font-weight-bold mr-2"><?= date('l, d F Y', strtotime($kegiatan->kegiatan_tanggal)) ?></span>

                            </div>
                            <!--end::Copyright-->

                            <!--begin::Nav-->
                            <?php $this->load->view('user-views/layouts/partials/sosial') ?>
                            <!--end::Nav-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->

                    <!--begin::Engage Widget 4-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        
                        <!--end::Engage Widget 4-->
                    </div>

                    <div class="card-body">
                        <p>
                            <?= $kegiatan->kegiatan_deskripsi?>
                        </p>
                    </div>
                </div>


            </div>
            <?php $this->load->view('user-views/layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
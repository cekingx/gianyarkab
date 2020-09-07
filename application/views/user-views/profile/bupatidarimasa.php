<title>Bupati dari masa ke masa</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Card-->
                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class=" container ">
                            <div class="card card-custom card-stretch">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h1>Bupati Dari Masa Ke Masa </h1>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <?php foreach($jabatanbupati as $jabatanbupati): ?>
                                        <!--begin::Column-->
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom gutter-b card-stretch">
                                                <!--begin::Body-->
                                                <div class="card-body text-center pt-4">


                                                    <!--begin::User-->
                                                    <div class="card card-custom bgi-no-repeat gutter-b"
                                                        style="height: auto; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; ">

                                                        <!--begin::Body-->
                                                        <img src="<?= base_url('assets/upload/jabatanbupati/') . $jabatanbupati['jabatan_bupati_foto'] ?>" class="d-block w-100 rounded"
                                                            alt="...">

                                                        <!--end::Body-->
                                                    </div>
                                                    <!--end::User-->

                                                    <!--begin::Name-->
                                                    <blockquote class="blockquote text-center">
                                                        <p class="mb-0"><?= $jabatanbupati['jabatan_bupati_nama'] ?></p>
                                                        <p class="text-dark-75 font-size-xs"><?= $jabatanbupati['jabatan_bupati_masa_jabatan'] ?></p>
                                                    </blockquote>
                                                    <!--end::Name-->

                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                        <!--end::Column-->
                                        <?php endforeach; ?>
                                    </div>
                                    <!--end::Row-->
                                </div>
                            </div>
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--end::Card-->

            </div>
            <?php $this->load->view('user-views/layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
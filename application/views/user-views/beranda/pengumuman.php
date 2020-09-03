<title>Pengumuman</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                Pengumuman
                                <!-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized
												from HTML table</span> -->
                            </h3>
                        </div>

                    </div>


                    <!-- foreach -->
                    <?php foreach($pengumuman as $pengumuman): ?>
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        <div class="row">
                            <div class="col-xl-12">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-body" style="
                                            border-top-width: 5px;
                                        ">

                                    <a href="<?= base_url('pengumuman/') . $pengumuman['pengumuman_slug'] ?>">

                                        <div class="container">
                                            <div class="row">

                                                <div class="col-xl-12">
                                                    <!--begin::Top-->
                                                    <div class="valign-items-center">
                                                        <!--begin: Info-->
                                                        <div class="flex-grow-1">
                                                            <!--begin::Title-->
                                                            <div
                                                                class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                                                <!--begin::User-->
                                                                <div class="mr-3">
                                                                    <!--begin::Name-->
                                                                        <div class="h2 text-hover-primary text-dark-75"
                                                                            >
                                                                            <?= $pengumuman['pengumuman_judul'] ?>
                                                                        </div>
                                                                    <!--end::Name-->
                                                                </div>
                                                                <!--begin::User-->
                                                            </div>
                                                            <!--end::Title-->

                                                           <!--begin::Content-->
                                                           <div
                                                                class="d-flex align-items-center flex-wrap justify-content-between">
                                                                <!--begin::Description-->
                                                                <div data-maxlength="700"
                                                                    class="text-box flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"
                                                                    style="width:100%">
                                                                    <div>
                                                                        <?= $pengumuman['pengumuman_isi'] ?>
                                                                    </div>
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Content-->
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Top-->

                                                    <!--begin::Separator-->
                                                    <div class="separator separator-solid my-1"></div>
                                                    <!--end::Separator-->

                                                    <!--begin::Date-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                                        <span
                                                            id="display-date"
                                                            class="text text-dark-65 font-weight-light text-right font-size-xs">
                                                            <?= $pengumuman['pengumuman_tanggal'] ?>
                                                            </span>
                                                    </div>
                                                    <!--end::Bottom-->
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end::Card-->
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- end berita 1 -->
                </div>
                <!--end::Card-->
            </div>
            <?php $this->load->view('user-views/layouts/partials/side.php'); ?>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script>
    $(".text-box div").text(function (index, currentText) {
        var maxLength = $(this).parent().attr('data-maxlength');
        if (currentText.length >= maxLength) {
            return currentText.substr(0, maxLength) + "...";
        } else {
            return currentText
        }
    });
</script>
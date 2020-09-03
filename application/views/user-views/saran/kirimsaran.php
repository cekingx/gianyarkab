<title>Dashboard | SKM Kab. Gianyar</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class=" container ">


                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5 class="card-label">
                                            Kirimkan Kritik dan Saranmu
                                        </h5>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form class="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan nama" />
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan alamat" />
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="masukkan email" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Topik</label>
                                                    <input type="text"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan topik" />
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label for="exampleTextarea">Pesan</label>
                                                    <textarea class="form-control form-control-solid form-control-lg"
                                                        id="exampleTextarea" rows="3"></textarea>
                                                    <span class="form-text text-muted">Masukkan pesan</span>
                                                </div>
                                                <!--end::Input-->

                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-12 col-sm-12 text-lg-right">Masukkan Gambar *opsional</label>
                                                        <div class="col-lg-12 col-md-9 col-sm-12">
                                                            <div class="dropzone dropzone-default" id="kt_dropzone_1">
                                                                <div class="dropzone-msg dz-message needsclick">
                                                                    <h3 class="dropzone-msg-title">Seret atau Klik untuk mengunggah gambar</h3>
                                                                    <!-- <span class="dropzone-msg-desc">This is just a demo
                                                                        dropzone. Selected files are
                                                                        <strong>not</strong> actually uploaded.</span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                    </div>

                                    <!--begin::Actions-->
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-6">
                                                <button type="reset"
                                                    class="btn btn-primary font-weight-bold mr-2">Kirim</button>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card-->


                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

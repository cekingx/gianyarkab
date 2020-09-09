<title>Kritik Saran</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!-- begin::notification -->
        <?php if(isset($error)) {
            echo('
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                <h4 class="alert-heading">Error</h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <hr>'
                . $error .
            '</div>
            ');
        } ?>

        <?php if(isset($message)) {
            echo('
            <div class="alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5" id="message" role="alert">
                <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                <div class="alert-text">'
                .$message.
                '</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            ');
        } ?>
        <!-- end::notification -->
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
                                <?= form_open_multipart('kirimsaran/store', 'id="kritik_saran_form"') ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-6">
                                                <!--begin::Nama-->
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text"
                                                        name="kritik_saran_nama" id="kritik_saran_nama"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan nama" />
                                                    <span style="display: none;" class="text-danger" id="need-nama">
                                                        Nama masih kosong
                                                    </span>
                                                </div>
                                                <!--end::Nama-->

                                                <!--begin::Alamat-->
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text"
                                                        name="kritik_saran_alamat" id="kritik_saran_alamat"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan alamat" />
                                                    <span style="display: none;" class="text-danger" id="need-alamat">
                                                        Alamat masih kosong
                                                    </span>
                                                </div>
                                                <!--end::Alamat-->

                                                <!--begin::Email-->
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email"
                                                        name="kritik_saran_email" id="kritik_saran_email"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="masukkan email" />
                                                    <span style="display: none;" class="text-danger" id="need-email">
                                                        Email masih kosong
                                                    </span>
                                                </div>
                                                <!--end::Email-->

                                                <!--begin::Judul-->
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text"
                                                        name="kritik_saran_judul" id="kritik_saran_judul"
                                                        class="form-control form-control-solid form-control-lg"
                                                        placeholder="Masukkan judul" />
                                                    <span style="display: none;" class="text-danger" id="need-judul">
                                                        Judul masih kosong
                                                    </span>
                                                </div>
                                                <!--end::Judul-->

                                                <!--begin::Isi-->
                                                <div class="form-group">
                                                    <label for="exampleTextarea">Pesan</label>
                                                    <textarea 
                                                        name="kritik_saran_isi"
                                                        placeholder="Masukkan Pesan"
                                                        class="form-control form-control-solid form-control-lg"
                                                        id="kritik_saran_isi" rows="3"></textarea>
                                                    <span style="display: none;" class="text-danger" id="need-isi">
                                                        Isi masih kosong
                                                    </span>
                                                </div>
                                                <!--end::Isi-->

                                                <!-- begin::Foto -->
                                                <div class="form-group">
                                                    <label for="kritik_saran_foto">Foto <small>*opsional</small></label>
                                                    <div class="custom-file">
                                                        <input 
                                                            type="file" 
                                                            name="kritik_saran_foto" id="kritik_saran_foto" 
                                                            class="custom-file-input"> 
                                                        <label for="kritik_saran_foto" class="custom-file-label">Pilih Gambar</label>
                                                    </div>
                                                </div>
                                                <!-- end::Foto -->
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                    </div>

                                    <!--begin::Actions-->
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-6">
                                                <button type="button"
                                                    id="btn-submit"
                                                    class="btn btn-primary font-weight-bold mr-2">Kirim</button>
                                            </div>
                                            <div class="col-xl-3"></div>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                <?= form_close(); ?>
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
            <?php $this->load->view('user-views/layouts/partials/side'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script>
    $('#kritik_saran_nama').keyup(function() {
        if($('#kritik_saran_nama').val() == '') {
            $('#kritik_saran_nama').addClass('is-invalid');
            $('#need-nama').fadeIn();
        } else {
            $('#kritik_saran_nama').removeClass('is-invalid');
            $('#need-nama').fadeOut();
        }
    });

    $('#kritik_saran_alamat').keyup(function() {
        if($('#kritik_saran_alamat').val() == '') {
            $('#kritik_saran_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else {
            $('#kritik_saran_alamat').removeClass('is-invalid');
            $('#need-alamat').fadeOut();
        }
    });

    $('#kritik_saran_email').keyup(function() {
        if($('#kritik_saran_email').val() == '') {
            $('#kritik_saran_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else {
            $('#kritik_saran_email').removeClass('is-invalid');
            $('#need-email').fadeOut();
        }
    });

    $('#kritik_saran_judul').keyup(function() {
        if($('#kritik_saran_judul').val() == '') {
            $('#kritik_saran_judul').addClass('is-invalid');
            $('#need-judul').fadeIn();
        } else {
            $('#kritik_saran_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut();
        }
    });

    $('#kritik_saran_isi').keyup(function() {
        if($('#kritik_saran_isi').val() == '') {
            $('#kritik_saran_isi').addClass('is-invalid');
            $('#need-isi').fadeIn();
        } else {
            $('#kritik_saran_isi').removeClass('is-invalid');
            $('#need-isi').fadeOut();
        }
    });

    $('#btn-submit').click(function() {
        if($('#kritik_saran_nama').val() == '') {
            $('#kritik_saran_nama').addClass('is-invalid');
            $('#need-nama').fadeIn();
        } else if($('#kritik_saran_alamat').val() == '') {
            $('#kritik_saran_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else if($('#kritik_saran_email').val() == '') {
            $('#kritik_saran_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else if($('#kritik_saran_judul').val() == '') {
            $('#kritik_saran_judul').addClass('is-invalid');
            $('#need-judul').fadeIn();
        } else if($('#kritik_saran_isi').val() == '') {
            $('#kritik_saran_isi').addClass('is-invalid');
            $('#need-isi').fadeIn();
        } else {
            $('#kritik_saran_form').submit();
        }
    });
</script>
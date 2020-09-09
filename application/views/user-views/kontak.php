<title>Hubungi Kami</title>
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
                            <div class="row">
                                <!--begin::Card-->
                                <div class="col-xl-4">
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h5 class="card-label">
                                                    Kontak
                                                </h5>
                                            </div>
                                        </div>
                                        <!--begin::Form-->
                                        <div class="card-body" style="    padding-top: 0px;">
                                            <div class="col-xl-12">
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Email:</span>
                                                        <a href="#"
                                                            class="text-muted text-hover-primary"><?= $narahubung['narahubung_email'] ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Phone:</span>
                                                        <span class="text-muted"><?= $narahubung['narahubung_telp'] ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Fax:</span>
                                                        <span class="text-muted"><?= $narahubung['narahubung_fax'] ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Alamat:</span>
                                                        <span class="text-muted text-right"><?= $narahubung['narahubung_alamat'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <div class="col-xl-8">
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h5 class="card-label">
                                                    Hubungi Kami
                                                </h5>
                                            </div>
                                        </div>
                                        <!--begin::Form-->
                                        <?= form_open('/kontak/store', 'id="kontak-form"') ?>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Nama-->
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" id="kontak_person_nama"
                                                                name="kontak_person_nama"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="Masukkan nama" />
                                                            <span style="display: none;" class="text-danger"
                                                                id="need-nama">
                                                                Nama masih kosong
                                                            </span>
                                                        </div>
                                                        <!--end::Nama-->

                                                        <!--begin::Alamat-->
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" id="kontak_person_alamat"
                                                                name="kontak_person_alamat"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="Masukkan alamat" />
                                                            <span style="display: none;" class="text-danger"
                                                                id="need-alamat">
                                                                Alamat masih kosong
                                                            </span>
                                                        </div>
                                                        <!--end::Alamat-->

                                                        <!--begin::Email-->
                                                        <div class="form-group">
                                                            <label>E-mail</label>
                                                            <input type="email" id="kontak_person_email"
                                                                name="kontak_person_email"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="masukkan email" />
                                                            <span style="display: none;" class="text-danger"
                                                                id="need-email">
                                                                Email masih kosong
                                                            </span>
                                                        </div>
                                                        <!--end::Email-->
                                                        <!--begin::Judul-->
                                                        <div class="form-group">
                                                            <label>Judul</label>
                                                            <input type="text" id="kontak_person_judul"
                                                                name="kontak_person_judul"
                                                                class="form-control form-control-solid form-control-lg"
                                                                placeholder="Masukkan judul" />
                                                            <span style="display: none;" class="text-danger"
                                                                id="need-judul">
                                                                Judul masih kosong
                                                            </span>
                                                        </div>
                                                        <!--end::Judul-->

                                                        <!--begin::Isi-->
                                                        <div class="form-group">
                                                            <label for="exampleTextarea">Isi</label>
                                                            <textarea id="kontak_person_isi_aduan"
                                                                name="kontak_person_isi_aduan" placeholder="Isi Pesan"
                                                                class="form-control form-control-solid form-control-lg"
                                                                id="exampleTextarea" rows="3"></textarea>
                                                            <span style="display: none;" class="text-danger"
                                                                id="need-isi">
                                                                Pesan masih kosong
                                                            </span>
                                                        </div>
                                                        <!--end::Isi-->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--begin::Actions-->
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <button type="button" id="btn-kirim"
                                                            class="btn btn-primary btn-block font-weight-bold mr-2">Kirim</button>
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

                            </div>
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
            </div>
            <?php $this->load->view('user-views/layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<script>

    $('#kontak_person_nama').keyup(function() {
        if($('#kontak_person_nama').val() == '') {
            $('#kontak_person_nama').addClass('is-invalid');
            $('#need-nama').fadeIn(3);
        } else {
            $('#kontak_person_nama').removeClass('is-invalid');
            $('#need-nama').fadeOut(3);
        }
    });

    $('#kontak_person_alamat').keyup(function() {
        if($('#kontak_person_alamat').val() == '') {
            $('#kontak_person_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else {
            $('#kontak_person_alamat').removeClass('is-invalid');
            $('#need-alamat').fadeOut();
        }
    });

    $('#kontak_person_email').keyup(function() {
        if($('#kontak_person_email').val() == '') {
            $('#kontak_person_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else {
            $('#kontak_person_email').removeClass('is-invalid');
            $('#need-email').fadeOut();
        }
    });

    $('#kontak_person_judul').keyup(function() {
        if($('#kontak_person_judul').val() == '') {
            $('#kontak_person_judul').addClass('is-invalid');
            $('#need-judul').fadeIn();
        } else {
            $('#kontak_person_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut();
        }
    });

    $('#kontak_person_isi_aduan').keyup(function() {
        if($('#kontak_person_isi_aduan').val() == '') {
            $('#kontak_person_isi_aduan').addClass('is-invalid');
            $('#need-isi').fadeIn();
        } else {
            $('#kontak_person_isi_aduan').removeClass('is-invalid');
            $('#need-isi').fadeOut();
        }
    });
    
    $('#btn-kirim').click(function() {
        if($('#kontak_person_nama').val() == '') {
            $('#kontak_person_nama').addClass('is-invalid');
            $('#need-nama').fadeIn();
        } else if($('#kontak_person_alamat').val() == '') {
            $('#kontak_person_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn();
        } else if($('#kontak_person_email').val() == '') {
            $('#kontak_person_email').addClass('is-invalid');
            $('#need-email').fadeIn();
        } else if($('#kontak_person_judul').val() == '') {
            $('#kontak_person_judul').addClass('is-invalid');
            $('#need-judul').fadeIn();
        } else if($('#kontak_person_isi_aduan').val() == '') {
            $('#kontak_person_isi_aduan').addClass('is-invalid');
            $('#need-isi_aduan').fadeIn();
        } else {
            $('#kontak-form').submit();
        }
    })

</script>
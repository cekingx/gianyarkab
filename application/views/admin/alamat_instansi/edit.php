<title>Edit Alamat Instansi</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Alamat Instansi
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="pengumuman_form">
            <div class="card-body">
                <!-- begin::alamat_instansi-id -->
                <input type="hidden" name="alamat_instansi_id" id="alamat_instansi_id"
                    value="<?= $alamat_instansi['alamat_instansi_id'] ?>">
                <!-- end::alamat_instansi-id -->
                <!-- begin::alamat_instansi-nama -->
                <div class="form-group">
                    <label>Nama Instansi</label>
                    <input type="text" class="form-control" placeholder="Nama Instansi" name="alamat_instansi_nama"
                        id="alamat_instansi_nama" value="<?= $alamat_instansi['alamat_instansi_nama'] ?>" />
                    <span style="display: none;" class="text-danger" id="need-nama">
                        Nama masih kosong
                    </span>
                </div>
                <!-- end::alamat_instansi-nama -->
                <!-- begin::alamat_instansi-alamat -->
                <div class="form-group">
                    <label>Alamat Instansi</label>
                    <input type="text" class="form-control" placeholder="Alamat Instansi" name="alamat_instansi_alamat"
                        id="alamat_instansi_alamat" value="<?= $alamat_instansi['alamat_instansi_alamat'] ?>" />
                    <span style="display: none;" class="text-danger" id="need-alamat">
                        Alamat masih kosong
                    </span>
                </div>
                <!-- end::alamat_instansi-alamat -->
                <!-- begin::alamat_instansi-telp -->
                <div class="form-group">
                    <label>Telepon Instansi</label>
                    <input type="text" class="form-control" placeholder="Telepon Instansi" name="alamat_instansi_telp"
                        id="alamat_instansi_telp" value="<?= $alamat_instansi['alamat_instansi_telp'] ?>" />
                    <span style="display: none;" class="text-danger" id="need-telp">
                        Telepon masih kosong
                    </span>
                </div>
                <!-- end::alamat_instansi-telp -->
                <!-- begin::alamat_instansi-email -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="alamat_instansi_email"
                        id="alamat_instansi_email" value="<?= $alamat_instansi['alamat_instansi_email'] ?>" />
                    <span style="display: none;" class="text-danger" id="need-email">
                        Email masih kosong
                    </span>
                </div>
                <!-- end::alamat_instansi-email -->
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary mr-2" id="btn-save">
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary" id="btn-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url('assets/ckeditor-full/ckeditor.js');?>"></script>
<script>
    $('.preloader').fadeOut();

    $('#alamat_instansi_nama').keyup( function() {
        if($('#alamat_instansi_nama').val() == '') {
            $('#alamat_instansi_nama').addClass('is-invalid');
            $('#need-nama').fadeIn(3);
        } else {
            $('#alamat_instansi_nama').removeClass('is-invalid');
            $('#need-nama').fadeOut(3);
        }
    });

    $('#alamat_instansi_alamat').keyup( function() {
        if($('#alamat_instansi_alamat').val() == '') {
            $('#alamat_instansi_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn(3);
        } else {
            $('#alamat_instansi_alamat').removeClass('is-invalid');
            $('#need-alamat').fadeOut(3);
        }
    });

    $('#alamat_instansi_telp').keyup( function() {
        if($('#alamat_instansi_telp').val() == '') {
            $('#alamat_instansi_telp').addClass('is-invalid');
            $('#need-telp').fadeIn(3);
        } else {
            $('#alamat_instansi_telp').removeClass('is-invalid');
            $('#need-telp').fadeOut(3);
        }
    });

    $('#alamat_instansi_email').keyup( function() {
        if($('#alamat_instansi_email').val() == '') {
            $('#alamat_instansi_email').addClass('is-invalid');
            $('#need-email').fadeIn(3);
        } else {
            $('#alamat_instansi_email').removeClass('is-invalid');
            $('#need-email').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#alamat_instansi_nama').val() == '') {
            $('#alamat_instansi_nama').addClass('is-invalid');
            $('#need-nama').fadeIn(3);
        } else if($('#alamat_instansi_alamat').val() == '') {
            $('#alamat_instansi_alamat').addClass('is-invalid');
            $('#need-alamat').fadeIn(3);
        } else if($('#alamat_instansi_telp').val() == '') {
            $('#alamat_instansi_telp').addClass('is-invalid');
            $('#need-telp').fadeIn(3);
        } else if($('#alamat_instansi_email').val() == '') {
            $('#alamat_instansi_email').addClass('is-invalid');
            $('#need-email').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/alamat-instansi/update') ?>',
                data: {
                    alamat_instansi_id: $('#alamat_instansi_id').val(),
                    alamat_instansi_nama: $('#alamat_instansi_nama').val(), 
                    alamat_instansi_alamat: $('#alamat_instansi_alamat').val(), 
                    alamat_instansi_telp: $('#alamat_instansi_telp').val(), 
                    alamat_instansi_email: $('#alamat_instansi_email').val(), 
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/admin/alamat-instansi') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('admin/alamat-instansi') ?>'
    })
</script>
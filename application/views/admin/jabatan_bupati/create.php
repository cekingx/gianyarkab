<title>Tambah Bupati</title>

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
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
        <!-- end::notification -->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Tambah Bupati</h3>
                </div>
            </div>
            <div class="card-body">
                <?= form_open('/admin/jabatan-bupati/store', 'enctype="multipart/form-data" id="bupati-form"') ?>
                    <!-- begin::nama-bupati -->
                    <div class="form-group">
                        <label for="jabatan_bupati_nama">Nama Bupati</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="jabatan_bupati_nama" 
                            name="jabatan_bupati_nama" 
                        >
                        <span style="display: none;" class="text-danger" id="need-nama">
                            Nama masih kosong
                        </span>
                    </div>
                    <!-- end::nama-bupati -->
                    <!-- begin::foto -->
                    <div class="form-group">
                        <label for="jabatan_bupati_foto">Foto</label> 
                        <input 
                            type="file" 
                            class="form-control" 
                            id="jabatan_bupati_foto" 
                            name="jabatan_bupati_foto" 
                        >
                        <span style="display: none;" class="text-danger" id="need-foto">
                            Foto masih kosong
                        </span>
                    </div>
                    <!-- end::foto -->
                    <!-- begin::masa-jabatan -->
                    <div class="form-group">
                        <label for="jabatan_bupati_masa_jabatan">Masa Jabatan</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="jabatan_bupati_masa_jabatan" 
                            name="jabatan_bupati_masa_jabatan" 
                        >
                        <span style="display: none;" class="text-danger" id="need-masa-jabatan">
                            Masa Jabatan masih kosong
                        </span>
                    </div>
                    <!-- end::masa-jabatan -->
                    <button type="button" class="btn btn-success" id="send">Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
        <!--end::Card-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<script type='text/javascript'>
$('.preloader').fadeOut();

let nama = $('#jabatan_bupati_nama').val();
let file = $('#jabatan_bupati_foto').val();
let masa_jabatan = $('#jabatan_bupati_masa_jabatan').val();

$('#jabatan_bupati_nama').keyup(function() {
    if($('#jabatan_bupati_nama').val() == '') {
        $('#jabatan_bupati_nama').addClass('is-invalid');
        $('#need-nama').fadeIn(3);
    } else {
        $('#jabatan_bupati_nama').removeClass('is-invalid');
        $('#need-nama').fadeOut(3);
    }
});

$('#send').click(function(e) {
    if(nama == '') {
        $('#jabatan_bupati_nama').addClass('is-invalid');
        $('#need-nama').fadeIn(3);
    } else if(file == '') {
        $('#jabatan_bupati_foto').addClass('is-invalid');
        $('#need-foto').fadeIn(3);
    } else if(masa_jabatan == '') {
        $('#jabatan_bupati_masa_jabatan').addClass('is-invalid');
        $('need-masa-jabatan').fadeIn(3);
    } else {
        $('.preloader').fadeIn();
        $('#bupati-form').submit();
    }
});

</script>
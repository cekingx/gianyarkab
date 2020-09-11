<title>Tambah Gambar</title>

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
                    <h3 class="card-label">Tambah Gambar</h3>
                </div>
            </div>
            <div class="card-body">
                <?= form_open('/admin/carousel/store', 'enctype="multipart/form-data" id="carousel-form"') ?>
                    <!-- begin::judul-carousel -->
                    <div class="form-group">
                        <label for="carousel_judul">Judul</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="carousel_judul" 
                            name="carousel_judul" 
                        >
                        <span style="display: none;" class="text-danger" id="need-judul">
                            Judul masih kosong
                        </span>
                    </div>
                    <!-- end::judul-carousel -->
                    <!-- begin::caption-carousel -->
                    <div class="form-group">
                        <label for="carousel_caption">Caption</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="carousel_caption" 
                            name="carousel_caption" 
                        >
                        <span style="display: none;" class="text-danger" id="need-caption">
                            Caption masih kosong
                        </span>
                    </div>
                    <!-- end::caption-carousel -->
                    <!-- begin::link-carousel -->
                    <div class="form-group">
                        <label for="carousel_link">Link</label> 
                        <input 
                            type="text" 
                            class="form-control" 
                            id="carousel_link" 
                            name="carousel_link" 
                        >
                        <span style="display: none;" class="text-danger" id="need-link">
                            Link masih kosong
                        </span>
                    </div>
                    <!-- end::link-carousel -->
                    <!-- begin::foto -->
                    <div class="form-group">
                        <label for="carousel_foto">Foto</label> 
                        <input 
                            type="file" 
                            class="form-control" 
                            id="carousel_foto" 
                            name="carousel_foto" 
                        >
                        <span style="display: none;" class="text-danger" id="need-foto">
                            Foto masih kosong
                        </span>
                    </div>
                    <!-- end::foto -->
                    <button type="button" class="btn btn-primary" id="send">Submit</button>
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

$('#carousel_judul').keyup(function() {
    if($('#carousel_judul').val() == '') {
        $('#carousel_judul').addClass('is-invalid');
        $('#need-judul').fadeIn();
    } else {
        $('#carousel_judul').removeClass('is-invalid');
        $('#need-judul').fadeOut();
    }
});

$('#carousel_caption').keyup(function() {
    if($('#carousel_caption').val() == '') {
        $('#carousel_caption').addClass('is-invalid');
        $('#need-caption').fadeIn();
    } else {
        $('#carousel_caption').removeClass('is-invalid');
        $('#need-caption').fadeOut();
    }
});

$('#carousel_foto').keyup(function() {
    if($('#carousel_foto').val() == '') {
        $('#carousel_foto').addClass('is-invalid');
        $('#need-foto').fadeIn();
    } else {
        $('#carousel_foto').removeClass('is-invalid');
        $('#need-foto').fadeOut();
    }
});

$('#send').click(function() {
    if($('#carousel_judul').val() == '') {
        $('#carousel_judul').addClass('is-invalid');
        $('#need-judul').fadeIn();
    } else if($('#carousel_caption').val() == '') {
        $('#carousel_caption').addClass('is-invalid');
        $('#need-caption').fadeIn();
    } else if($('#carousel_foto').val() == '') {
        $('#carousel_foto').addClass('is-invalid');
        $('#need-foto').fadeIn();
    } else {
        $('#preloader').fadeIn();
        $('#carousel-form').submit();
    }  
})

</script>
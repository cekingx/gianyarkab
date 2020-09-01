<title>Pengumuman</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pengumuman
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form">
            <div class="card-body">
                <!-- begin::input-judul -->
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input 
                        type="text" 
                        class="form-control form-control-solid" 
                        placeholder="Judul"
                        name="pengumuman_judul"
                        id="pengumuman_judul"
                    />
                    <span 
                        style="display: none;" 
                        class="form-text text-muted"
                        id="need-judul"
                    >
                        Judul masih kosong
                    </span>
                </div>
                <!-- end::input-judul -->
                <!-- begin::input-isi -->
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <input 
                        type="text" 
                        class="form-control form-control-solid" 
                        placeholder="Isi"
                        name="pengumuman_isi"
                        id="pengumuman_isi"
                    />
                    <span 
                        style="display: none;" 
                        class="form-text text-muted"
                        id="need-isi"
                    >
                        Isi masih kosong
                    </span>
                </div>
                <!-- end::input-isi -->
            </div>
            <div class="card-footer">
                <button 
                    type="button" 
                    class="btn btn-primary mr-2"
                    id="btn-save"
                >
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('#pengumuman_judul').keyup( function() {
        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#pengumuman_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#pengumuman_isi').keyup( function() {
        if($('#pengumuman_isi').val() == '') {
            $('#pengumuman_isi').addClass('is-invalid');
            $('#need-isi').fadeIn(3);
        } else {
            $('#pengumuman_isi').removeClass('is-invalid');
            $('#need-isi').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if($('#pengumuman_isi').val() == '') {
            $('#pengumuman_isi').addClass('is-invalid');
            $('#need-isi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
        }
    });
</script>
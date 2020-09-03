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
        <form class="form" id="pengumuman_form">
            <div class="card-body">
                <!-- begin::pengumuman-judul -->
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" class="form-control" placeholder="Judul" name="pengumuman_judul"
                        id="pengumuman_judul" />
                    <span style="display: none;" class="text-danger" id="need-judul">
                        Judul masih kosong
                    </span>
                </div>
                <!-- end::pengumuman-judul -->
                <!-- begin::pengumuman-isi -->
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea name="pengumuman_isi" id="pengumuman_isi" class="form-control"></textarea>
                    <span style="display: none;" class="text-danger" id="need-isi">
                        Isi masih kosong
                    </span>
                </div>
                <!-- end::pengumuman-isi -->
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

    $(function () {
        CKEDITOR.replace('pengumuman_isi');
    });

    $('#pengumuman_judul').keyup( function() {
        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#pengumuman_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        var pengumuman_isi = CKEDITOR.instances.pengumuman_isi.getData();

        if($('#pengumuman_judul').val() == '') {
            $('#pengumuman_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if(pengumuman_isi == '') {
            $('#need-isi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/pengumuman/store') ?>',
                data: {
                    pengumuman_judul: $('#pengumuman_judul').val(),
                    pengumuman_isi: pengumuman_isi
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/admin/pengumuman') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('admin/pengumuman') ?>'
    })
</script>
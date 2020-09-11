<title>Ucapan Perayaan</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Ucapan Perayaan
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="ucapan_perayaan_form">
            <div class="card-body">
                <!-- begin::teks -->
                <div class="form-group">
                    <label>Teks</label>
                    <input type="text" class="form-control" placeholder="Teks" name="ucapan_perayaan_teks"
                        id="ucapan_perayaan_teks" />
                    <span style="display: none;" class="text-danger" id="need-teks">
                        Teks masih kosong
                    </span>
                </div>
                <!-- end::teks -->
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

<script>
    $('.preloader').fadeOut();

    $('#ucapan_perayaan_teks').keyup( function() {
        if($('#ucapan_perayaan_teks').val() == '') {
            $('#ucapan_perayaan_teks').addClass('is-invalid');
            $('#need-teks').fadeIn(3);
        } else {
            $('#ucapan_perayaan_teks').removeClass('is-invalid');
            $('#need-teks').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#ucapan_perayaan_teks').val() == '') {
            $('#ucapan_perayaan_teks').addClass('is-invalid');
            $('#need-teks').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/ucapan-perayaan/store') ?>',
                data: {
                    ucapan_perayaan_teks: $('#ucapan_perayaan_teks').val(), 
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/admin/ucapan-perayaan') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('admin/ucapan-perayaan') ?>'
    })
</script>
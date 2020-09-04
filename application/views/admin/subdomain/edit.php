<title>Edit Sub Domain</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Sub Domain
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="pengumuman_form">
            <div class="card-body">
                <!-- begin::id -->
                <input type="hidden" name="sub_domain_id" id="sub_domain_id" value="<?= $subdomain['sub_domain_id'] ?>">
                <!-- end::id -->
                <!-- begin::link -->
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" placeholder="Link" name="sub_domain_link"
                        id="sub_domain_link" value="<?= $subdomain['sub_domain_link'] ?>"/>
                    <span style="display: none;" class="text-danger" id="need-link">
                        Link masih kosong
                    </span>
                </div>
                <!-- end::link -->
                <!-- begin::deskripsi -->
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi" name="sub_domain_deskripsi"
                        id="sub_domain_deskripsi" value="<?= $subdomain['sub_domain_deskripsi'] ?>"/>
                    <span style="display: none;" class="text-danger" id="need-alamat">
                        Deskripsi masih kosong
                    </span>
                </div>
                <!-- end::deskripsi -->
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

    $('#sub_domain_link').keyup( function() {
        if($('#sub_domain_link').val() == '') {
            $('#sub_domain_link').addClass('is-invalid');
            $('#need-link').fadeIn(3);
        } else {
            $('#sub_domain_link').removeClass('is-invalid');
            $('#need-link').fadeOut(3);
        }
    });

    $('#sub_domain_deskripsi').keyup( function() {
        if($('#sub_domain_deskripsi').val() == '') {
            $('#sub_domain_deskripsi').addClass('is-invalid');
            $('#need-alamat').fadeIn(3);
        } else {
            $('#sub_domain_deskripsi').removeClass('is-invalid');
            $('#need-alamat').fadeOut(3);
        }
    });

    $('#btn-save').click( function() {
        if($('#sub_domain_link').val() == '') {
            $('#sub_domain_link').addClass('is-invalid');
            $('#need-link').fadeIn(3);
        } else if($('#sub_domain_deskripsi').val() == '') {
            $('#sub_domain_deskripsi').addClass('is-invalid');
            $('#need-deskripsi').fadeIn(3);
        } else {
            $('.preloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/subdomain/update') ?>',
                data: {
                    sub_domain_id: $('#sub_domain_id').val(),
                    sub_domain_link: $('#sub_domain_link').val(), 
                    sub_domain_deskripsi: $('#sub_domain_deskripsi').val(), 
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('.preloader').fadeOut();
                    window.location = '<?= base_url('/admin/subdomain') ?>';
                },
                error: function(xhr, desc, err) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $('#btn-cancel').click(function() {
        window.location = '<?= base_url('admin/subdomain') ?>'
    })
</script>
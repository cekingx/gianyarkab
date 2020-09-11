<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/kegiatan/edit/') . $kegiatan->kegiatan_id ?>" class="btn btn-icon btn-light-warning mr-2">
                <i class="flaticon2-edit"></i>
            </a>
            <a class="btn btn-icon btn-light-danger btn-delete">
                <i class="flaticon2-trash"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Judul</td>
                    <td><?= $kegiatan->kegiatan_judul ?></td>
                </tr>                
                <tr>
                    <td>Jenis</td>
                    <td><?= $kegiatan->kegiatan_deskripsi ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><?= $kegiatan->kegiatan_tanggal ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $kegiatan->kegiatan_id ?>;
        bootbox.confirm({
            title: "Hapus kegiatan",
            message: "Apakah anda yakin menghapus kegiatan?",
            buttons: {
                cancel: {
                    label: "Batal"
                },
                confirm: {
                    label: "Hapus",
                    className: 'btn-primary'
                }
            },
            callback: function(result) {
                if(result) {
                    $('.preloader').fadeIn();
                    $.ajax({
                        type: 'GET',
                        url: "<?= base_url('kegiatan/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/kegiatan') ?>')
                        },
                        error: function(xhr, desc, err) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            }
        });
    });
</script>
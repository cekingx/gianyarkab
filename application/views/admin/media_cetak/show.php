<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/banner') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="<?= base_url('/assets/upload/media_cetak/'.$media_cetak->media_cetak_file) ?>" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/media_cetak/edit/') . $media_cetak->media_cetak_id ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td>Nama</td>
                    <td><?= $media_cetak->media_cetak_nama ?></td>
                </tr>
                <tr>
                    <td>File Media Cetak</td>
                    <td><a href="<?= base_url('/assets/upload/media_cetak/'.$media_cetak->media_cetak_file) ?>"/><?= $media_cetak->media_cetak_file ?></a></td>
                </tr>                
                <tr>
                    <td>Tanggal</td>
                    <td><?= $media_cetak->media_cetak_tanggal ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $media_cetak->media_cetak_id ?>;
        bootbox.confirm({
            title: "Hapus banner",
            message: "Apakah anda yakin menghapus banner?",
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
                        url: "<?= base_url('media_cetak/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/media_cetak') ?>')
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
<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="<?= base_url('pengumuman/') . $pengumuman['pengumuman_slug'] ?>" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/pengumuman/edit/') . $pengumuman['pengumuman_id'] ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td><?= $pengumuman['pengumuman_judul'] ?></td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td><?= $pengumuman['pengumuman_slug'] ?></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><?= $pengumuman['pengumuman_isi'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><?= $pengumuman['pengumuman_tanggal'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $pengumuman['pengumuman_id'] ?>;
        bootbox.confirm({
            title: "Hapus Pengumuman",
            message: "Apakah anda yakin menghapus pengumuman?",
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
                        url: "<?= base_url('admin/pengumuman/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/pengumuman') ?>')
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
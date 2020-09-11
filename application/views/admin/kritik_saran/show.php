<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/kritik-saran') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
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
                    <td><?= $kritik_saran['kritik_saran_nama'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $kritik_saran['kritik_saran_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $kritik_saran['kritik_saran_email'] ?></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><?= $kritik_saran['kritik_saran_judul'] ?></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><?= $kritik_saran['kritik_saran_isi'] ?></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><img class="img-fluid" src="<?= base_url('assets/upload/kritiksaran/') . $kritik_saran['kritik_saran_foto'] ?>" alt="<?= $kritik_saran['kritik_saran_judul'] ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><?= $kritik_saran['kritik_saran_tanggal'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $kritik_saran['kritik_saran_id'] ?>;
        bootbox.confirm({
            title: "Hapus Kritik Saran",
            message: "Apakah anda yakin menghapus kritik saran?",
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
                        url: "<?= base_url('admin/kritik-saran/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/kritik-saran') ?>')
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

<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/alamat-instansi') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="<?= base_url('alamatinstansi/')?>" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/alamat-instansi/edit/') . $alamat_instansi['alamat_instansi_id'] ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td><?= $alamat_instansi['alamat_instansi_nama'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $alamat_instansi['alamat_instansi_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><?= $alamat_instansi['alamat_instansi_telp'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $alamat_instansi['alamat_instansi_email'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $alamat_instansi['alamat_instansi_id'] ?>;
        bootbox.confirm({
            title: "Hapus Alamat Instansi",
            message: "Apakah anda yakin menghapus alamat instansi?",
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
                        url: "<?= base_url('admin/alamat-instansi/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/alamat-instansi') ?>')
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
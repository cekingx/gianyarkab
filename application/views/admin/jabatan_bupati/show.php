<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/jabatan-bupati') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="<?= base_url('bupatidarimasa/') . $jabatanbupati['jabatan_bupati_id'] ?>" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/jabatan-bupati/edit/') . $jabatanbupati['jabatan_bupati_id'] ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td><?= $jabatanbupati['jabatan_bupati_nama'] ?></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="<?= base_url('assets/upload/jabatanbupati/') . $jabatanbupati['jabatan_bupati_foto'] ?>" alt="" class="img-fluid"></td>
                </tr>
                <tr>
                    <td>Masa Jabatan</td>
                    <td><?= $jabatanbupati['jabatan_bupati_masa_jabatan'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td><?= $jabatanbupati['jabatan_bupati_tanggal'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $jabatanbupati['jabatan_bupati_id'] ?>;
        bootbox.confirm({
            title: "Hapus Bupati yang Menjabat",
            message: "Apakah anda yakin menghapus bupati?",
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
                        url: "<?= base_url('admin/jabatan-bupati/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/jabatan-bupati') ?>')
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
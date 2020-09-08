<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-primary font-weight-bold">
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
                    <td><?= $kontak['kontak_person_nama'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $kontak['kontak_person_alamat'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $kontak['kontak_person_email'] ?></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><?= $kontak['kontak_person_judul'] ?></td>
                </tr>
                <tr>
                    <td>Pesan</td>
                    <td><?= $kontak['kontak_person_isi_aduan'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><?= $kontak['kontak_person_tanggal'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $kontak['kontak_person_id'] ?>;
        bootbox.confirm({
            title: "Hapus Pesan",
            message: "Apakah anda yakin menghapus pesan?",
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
                        url: "<?= base_url('admin/kontak/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/kontak') ?>')
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
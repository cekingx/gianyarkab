<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/carousel') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <a target="_blank" href="<?= base_url('home')?>" class="btn btn-icon btn-light-info mr-2">
                <i class="flaticon-eye"></i>
            </a>
            <a href="<?= base_url('admin/carousel/edit/') . $carousel['carousel_id'] ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td><?= $carousel['carousel_judul'] ?></td>
                </tr>
                <tr>
                    <td>Caption</td>
                    <td><?= $carousel['carousel_caption'] ?></td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td><?= $carousel['carousel_link'] ?></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="<?= base_url('assets/upload/carousel/') . $carousel['carousel_foto'] ?>" alt="" class="img-thumbnail"></td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td><?= $carousel['carousel_tanggal'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.preloader').fadeOut();

    $('.btn-delete').click(function() {
        let id = <?= $carousel['carousel_id'] ?>;
        bootbox.confirm({
            title: "Hapus Foto",
            message: "Apakah anda yakin menghapus foto?",
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
                        url: "<?= base_url('admin/carousel/delete/') ?>" + id,
                        dataType: 'json',
                        success: function(data) {
                            $('.preloader').fadeOut();
                            window.location.replace('<?= base_url('admin/carousel') ?>')
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
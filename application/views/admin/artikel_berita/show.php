<title><?= $title ?></title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/galeri') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">
            <?php if($artikel_berita->artikel_berita_jenis == 0):?>
                <a target="_blank" href="<?= base_url('arsip/artikel/') . $artikel_berita->artikel_berita_slug ?>" class="btn btn-icon btn-light-info mr-2">
                    <i class="flaticon-eye"></i>
                </a>
            <?php else :?>
                <a target="_blank" href="<?= base_url('arsip/berita/') . $artikel_berita->artikel_berita_slug ?>" class="btn btn-icon btn-light-info mr-2">
                    <i class="flaticon-eye"></i>
                </a>
            <?php endif?>
            <a href="<?= base_url('admin/artikel_berita/edit/') . $artikel_berita->artikel_berita_id ?>" class="btn btn-icon btn-light-warning mr-2">
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
                    <td><?= $artikel_berita->artikel_berita_judul ?></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><?php if($artikel_berita->artikel_berita_jenis == 0 ):?>
                           <?= 'Artikel'; ?>
                        <?php else : ?>
                           <?= 'Berita'; ?>
                        <?php endif; ?>
                    </td>
                </tr>                              
                <tr>
                    <td>Deskripsi</td>
                    <td><?= $artikel_berita->artikel_berita_isi ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><?= $artikel_berita->artikel_berita_tanggal ?></td>
                </tr>
            </tbody>
        </table>
        <form id="form_artikel_berita" method="POST" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Foto</label>
            <div></div>
            <input type="hidden" name="id_artikel_berita" id="id_artikel_berita" value="<?php echo $artikel_berita->artikel_berita_id ?>">
            <input type="hidden" name="slug_artikel_berita" id="slug_artikel_berita" value="<?php echo $artikel_berita->artikel_berita_slug ?>">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="media_artikel_berita" name = "media_artikel_berita[]" multiple="">
              <label class="custom-file-label" for="customFile">Choose file</label>      
            </div>
            <span style="display: none;" class="form-text text-muted" id="need-foto" >
                foto masih kosong
            </span> 
          </div>          
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/artikel_berita') ?>">Back</a>
      </form>
    </div>
</div>

<?php if(isset($message)) {
    echo('
    <div class="alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5" id="message" role="alert">
        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
        <div class="alert-text">'
        .$message.
        '</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
    ');
} ?>

<div class="card card-custom gutter-b">
    
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Media Artikel/Berita
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
    </div>
</div>


<script>
    $('.preloader').fadeOut();
    var KTDatatableArtikelBerita = function () {
        var demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '<?= base_url('admin/artikel_berita/media/data/'.$artikel_berita->artikel_berita_id) ?>',
                            map: function(raw) {
                                var dataset = raw;
                                if(typeof raw.data !== 'undefined') {
                                    dataset = raw.data;
                                }
                                return dataset;
                            }
                        }
                    },
                    pageSize: 10,
                    serverSorting: false
                },
                layout: {
                    scroll: false,
                    footer: false
                },
                pagnation: true,
                columns: [
                    {
                        field: 'artikel_berita_media_media',
                        title: 'Media',
                        sortable: true,
                        template: function(row) {                            
                            return '<img src="<?php echo base_url("/assets/upload/artikel_berita/")?>'+row.artikel_berita_media_media+ '"'+'width="200"/>';                                    
                        }
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 100,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                <button data-id_artikel="'+row.artikel_berita_media_artikel_berita_id+'" data-id_media="'+row.artikel_berita_media_id+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                            </g>\
                                        </svg>\
                                    </span>\
                                </button>\
                            ';
                        }
                    }
                ]
            });

            $(document).on("click", ".btnDelete", function() {
                let id_artikel = $(this).data('id_artikel');
                let id_media = $(this).data('id_media');
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
                                url: "<?= base_url('artikel_berita/delete_media/') ?>" + id_media + "/" + id_artikel,
                                dataType: 'json',
                                success: function(data) {
                                    $('.preloader').fadeOut();
                                    window.location.reload();
                                },
                                error: function(xhr, desc, err) {
                                    console.log(xhr.responseText);
                                }                                
                            });
                        }
                    }
                });
            });

            $(document).on("click", ".btnEdit", function() {
                let id = $(this).data('id');
                
                // console.log("<?= base_url('admin/banner/edit/') ?>" + id)
                window.location.replace("<?= base_url('admin/artikel_berita/edit/') ?>" + id);
            });
        }

        return {
            init: function() {
                demo();
            }
        };
    }();

    $(document).ready(function() {
        KTDatatableArtikelBerita.init()
    });

    $('.btnNew').click(function() {
        window.location = '<?= base_url('admin/artikel_berita/create') ?>'
    })

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var fileToUpload = $('input:file').val();
    var formData = new FormData($("#form_artikel_berita")[0]);
    var id = $('#id_artikel_berita').val();
    var slug = $('#slug_artikel_berita').val();       
    if(fileToUpload == ''){
      $('#media_artikel_berita').addClass('is-invalid');
      $('#need-foto').fadeIn(3);
      
    }else{
      $.ajax({
        url : '<?php echo site_url('admin/artikel_berita/media/store/')?>'+id+'/'+slug,
        type : 'POST',  
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,     
        // dataType : 'json',
        // data : data,
        success: function(data){                
          alert("Upload Data berhasil di lakukan");
          location.reload();
          console.log(data);                    
        }
      })            
    }
})
</script>


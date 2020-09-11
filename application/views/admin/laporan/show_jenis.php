<title>Jenis Laporan</title>

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('admin/laporan') ?>" class="btn btn-primary font-weight-bold">
                <i class="flaticon2-left-arrow"></i> Kembali
            </a>
        </div>
        <div class="card-toolbar">                     
        </div>
    </div>
    <div class="card-body">        
        <form id="form_laporan" method="POST" enctype="multipart/form-data" role="form">
          <div class="form-group">                                            
              <label for="nama">Nama Laporan</label> 
              <input type="text" class="form-control" id="jenis_nama" name="jenis_nama" placeholder = "Nama">
              <span style="display: none;" class="form-text text-muted" id="need-nama" >
                  Jenis masih kosong
              </span>                             
            </div>          
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/laporan') ?>">Back</a>
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
                Jenis laporan
            </h3>
        </div>
            <div class="card-toolbar">           
        </div>
    </div>
    <div class="card-body">
        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
    </div>
</div>


<script>
    $('.preloader').fadeOut();
    var KTDatatableJenisLaporan = function () {
        var demo = function() {
            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '<?= base_url('admin/laporan/jenis/data/') ?>',
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
                        field: 'jenis_laporan_nama',
                        title: 'Jenis Laporan',
                        sortable: true,                        
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
                                <button data-id="'+row.jenis_laporan_id+'" class="btn btn-sm btn-clean btn-icon mr-2 btnEdit" title="Edit details">\
                                    <span class="svg-icon svg-icon-md">\
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                <rect x="0" y="0" width="24" height="24"/>\
                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                            </g>\
                                        </svg>\
                                    </span>\
                                </button>\
                                <button data-id="'+row.jenis_laporan_id+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
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
                let id_laporan = $(this).data('id');                
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
                                url: "<?= base_url('laporan/delete_jenis/') ?>" + id_laporan,
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
                window.location.replace("<?= base_url('admin/laporan/jenis/edit/') ?>" + id);
            });
        }

        return {
            init: function() {
                demo();
            }
        };
    }();

    $(document).ready(function() {
        KTDatatableJenisLaporan.init()
    });
   


$('#jenis_nama').keyup( function() {
  if($('#jenis_nama').val() == '') {
      $('#jenis_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);
  } else {
      $('#jenis_nama').removeClass('is-invalid');
      $('#need-nama').fadeOut(3);
  }
  });

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();    
    var formData = new FormData($("#form_laporan")[0]);          
    if($('#jenis_nama').val() == ''){
      $('#jenis_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);      
    }else{
      $.ajax({
        url : '<?php echo site_url('admin/laporan/jenis/store/')?>',
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

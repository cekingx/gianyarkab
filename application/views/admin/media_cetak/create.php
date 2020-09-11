<title>Media Cetak</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Media Cetak
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="form" id="form_media_cetak" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label for="nama">Nama Media Cetak</label> 
              <input type="text" class="form-control" id="media_cetak_nama" name="media_cetak_nama" placeholder = "Nama">
            <span style="display: none;" class="form-text text-muted" id="need-nama" >
              Nama Media Cetak masih kosong
            </span> 
          </div>                    
          <div class="form-group">
            <label>File Media Cetak</label>
            <div></div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file_media_cetak" name = "file_media_cetak">
              <label class="custom-file-label" for="customFile">Choose file</label>                    
            </div>
            <span style="display: none;" class="form-text text-muted" id="need-file" >
              File Media Cetak Masih Kosong
            </span> 
          </div>                          
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/media_cetak') ?>">Back</a>
        </form>
    </div>
</div>

<script type="text/javascript">
$('.preloader').fadeOut();

$('#media_cetak_nama').keyup( function() {
  if($('#media_cetak_nama').val() == '') {
      $('#media_cetak_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);
  } else {
      $('#media_cetak_nama').removeClass('is-invalid');
      $('#need-nama').fadeOut(3);
  }
});  

$("#validasi").on('click',function(){
    // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var formData = new FormData($("#form_media_cetak")[0]);
    var fileToUpload = $('input:file').val();            
    
    if($('#media_cetak_nama').val() == '') {
      $('#media_cetak_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);
            
    }else if(fileToUpload == ''){
      $('#file_media_cetak').addClass('is-invalid');
      $('#need-file').fadeIn(3);  
    }else{
      $.ajax({
        url : '<?php echo site_url('admin/media_cetak/store') ?>',
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
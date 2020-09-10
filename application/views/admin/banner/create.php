<title>Banner</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Banner
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="form" id="form_banner" enctype="multipart/form-data" role="form">
            <div class="card-body">
                <!-- begin::pengumuman-judul -->
              <div class="form-group">
                <label for="nama">Judul Banner</label> 
                <input type="text" class="form-control" id="judul_banner" name="judul_banner" placeholder = "Judul Banner">
                <span style="display: none;" class="form-text text-muted" id="need-judul" >
                  Judul masih kosong
                </span>                                                  
              </div>                    
              <div class="form-group">
                <label>File Banner</label>
                <div></div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name = "file_banner" id="file_banner">
                  <label class="custom-file-label" for="customFile">Choose file</label>                    
                </div>
                <span style="display: none;" class="form-text text-muted" id="need-file" >
                  file masih kosong
                </span>                      
              </div>
              <div class="form-group">
                <label for="exampleSelectd">Jenis Banner</label>
                <select class="form-control" id="exampleSelectd" name="jenis_banner" id="jenis_banner">
                  <option value="3">Pilih ...</option>
                  <option value="0">Banner Besar</option>
                  <option value="1">Banner Kecil</option>                        
                </select>
                <span style="display: none;" class="form-text text-muted" id="need-jenis" >
                  Silakan Pilih Jenis
                </span> 
              </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary mr-2" id="validasi">
                    Submit
                </button>
                <a href="<?php echo site_url('admin/banner') ?>" type="reset" class="btn btn-secondary" id="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
  $('.preloader').fadeOut();

$('#judul_banner').keyup( function() {
  if($('#judul_banner').val() == '') {
      $('#judul_banner').addClass('is-invalid');
      $('#need-judul').fadeIn(3);
  } else {
      $('#judul_banner').removeClass('is-invalid');
      $('#need-judul').fadeOut(3);
  }
});  

$('#file_banner').keyup( function() {
  if($('#file_banner').val() == '') {
      $('#file_banner').addClass('is-invalid');
      $('#need-file').fadeIn(3);
  } else {
      $('#file_banner').removeClass('is-invalid');
      $('#need-file').fadeOut(3);
  }
});  

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();    
    var fileToUpload = $('input:file').val();  
    var jenisBanner = $('select').find('option:selected').val();
    var formData = new FormData($("#form_banner")[0]);
    
    if($('#judul_banner').val() == '') {
      $('#judul_banner').addClass('is-invalid');
      $('#need-judul').fadeIn(3);        
    }else if(fileToUpload == ''){
      $('#file_banner').addClass('is-invalid');
      $('#need-file').fadeIn(3);
    }else if(jenisBanner == 3){
      $('#jenis_banner').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
    }
    else{
      $.ajax({
        url : '<?php echo base_url('admin/banner/store')?>',
        type : 'POST',  
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,     
        // dataType : 'json',
        // data : data,
        success: function(data){                
          alert("Upload Data Berhasil..");
          location.reload();
          console.log(data);                    
        },
        error: function(xhr, desc, err) {
            console.log(xhr.responseText);
        }
      })            
    }
  })


</script>
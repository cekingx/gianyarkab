<title>Pengumuman</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pengumuman
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="form" id="testForm">
            <div class="card-body">
                <!-- begin::pengumuman-judul -->
              <div class="form-group">
                <label for="nama">Judul Banner</label> 
                <input type="text" class="form-control" id="judul" name="judul" placeholder = "Judul Banner">
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
                <select class="form-control" id="exampleSelectd" name="banner_jenis" id="banner_jenis">
                  <option value="3">Pilih ...</option>
                  <option value="0">Banner Besar</option>
                  <option value="1">Banner Kecil</option>                        
                </select>
                <span style="display: none;" class="form-text text-muted" id="need-jenis" >
                  Silakan Pilih Jenis
                </span> 
              </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2" id="validasi">
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary" id="btn-cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
  $('.preloader').fadeOut();

$('#judul').keyup( function() {
  if($('#judul').val() == '') {
      $('#judul').addClass('is-invalid');
      $('#need-judul').fadeIn(3);
  } else {
      $('#judul').removeClass('is-invalid');
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

$("#testForm").submit(function(e){
  e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var fileToUpload = $('input:file').val();  
    var jenisBanner = $('select').find('option:selected').val();
    
    if($('#judul').val() == '') {
      $('#judul').addClass('is-invalid');
      $('#need-judul').fadeIn(3);        
    }else if(fileToUpload == ''){
      $('#file_banner').addClass('is-invalid');
      $('#need-file').fadeIn(3);
    }
    else if(jenisBanner == 3){
      $('#banner_jenis').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
    }
    else{
      $.ajax({
        url : '<?php echo base_url('admin/banner/store')?>',
        type : 'POST',  
        data: new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,     
        // dataType : 'json',
        // data : data,
        success: function(data){                
          alert("Upload Image Berhasil.");
          location.reload();
          console.log(data);                    
        }
      })            
    }
})


</script>
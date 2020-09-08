<title>Edit Pengumuman</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pengumuman
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="form_banner" method="POST" enctype="multipart/form-data" role="form">
            <div class="form-group">
              <input type="hidden" name="id" id="banner_id" value="<?php echo $banner->banner_id ?>">
                <label for="nama">Judul Banner</label> 
                <input type="text" class="form-control" id="judul_banner" name="judul_banner" placeholder = "Judul Banner" value ="<?php echo $banner->banner_judul?>">
                <span style="display: none;" class="form-text text-muted" id="need-judul" >
                  Judul masih kosong
                </span>
              </div>                    
              <div class="form-group">
                <label>File Banner</label>
                <div></div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name = "file_banner">
                  <input type="hidden" name="old_files" value="<?php echo $banner->banner_file ?>">
                  <label class="custom-file-label" for="customFile">Choose file</label>                    
                </div>
                <span style="display: none;" class="form-text text-muted" id="need-file" >
                  file masih kosong
                </span> 
              </div>
              <div class="form-group">
                <label for="exampleSelectd">Jenis Banner</label>
                <select class="form-control" id="exampleSelectd" name="jenis_banner" id="jenis_banner">
                  <?php if($banner->banner_jenis == 0) :?>
                    <option value="3">Pilih ...</option>
                    <option value="0" selected="">Banner Besar</option>
                    <option value="1">Banner Kecil</option>                        
                  <?php elseif($banner->banner_jenis == 1) :?>
                    <option value="3">Pilih ...</option>
                    <option value="0">Banner Besar</option>
                    <option value="1" selected="">Banner Kecil</option>                        
                  <?php else :?>
                    <option value="3">Pilih ...</option>
                    <option value="0">Banner Besar</option>
                    <option value="1">Banner Kecil</option>                          
                  <?php endif; ?>
                </select>
                <span style="display: none;" class="form-text text-muted" id="need-jenis" >
                  Silakan Pilih Jenis
                </span> 
              </div>
              <div class="form-group">
                <label for="tanggal_kegiatan">Tanggal Banner</label>
                <input type="text" class="form-control" id="tanggal" placeholder="tanggal_banner" name="tanggal_banner" value="<?php echo $banner->banner_tanggal ?>">
                <span style="display: none;" class="form-text text-muted" id="need-tanggal" >
                  Tanggal masih kosong
                </span>
              </div>   
            <div class="card-footer">
                <button type="button" class="btn btn-primary mr-2" id="validasi">
                    Submit
                </button>
                <a href="<?php echo site_url('admin/banner') ?>" type="button" class="btn btn-secondary" id="btn-cancel">Back</a>
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

$('#tanggal_banner').keyup( function() {
  if($('#tanggal_banner').val() == '') {
      $('#tanggal_banner').addClass('is-invalid');
      $('#need-tanggal').fadeIn(3);
  } else {
      $('#tanggal_banner').removeClass('is-invalid');
      $('#need-tanggal').fadeOut(3);
  }
});   

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var fileToUpload = $('input:file').val();  
    var jenisBanner = $('select').find('option:selected').val();
    var id = $('#banner_id').val();
    var formData = new FormData($("#form_banner")[0]);
    
    if($('#judul_banner').val() == '') {
      $('#judul_banner').addClass('is-invalid');
      $('#need-judul').fadeIn(3);        
    }else if($('#tanggal_banner').val() == ''){
      $('#tanggal_banner').addClass('is-invalid');
      $('#need-tanggal').fadeIn(3);
    }else if(jenisBanner == 3){
      $('#jenis_banner').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
    }else{
      $.ajax({
        url : '<?php echo base_url('admin/banner/update/')?>',
        type : 'POST',  
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,     
        // dataType : 'json',
        // data : data,
        success: function(data){                
          alert("Edit Data Berhasil.");
          location.reload();
          window.location.replace("<?= base_url('admin/banner/edit/') ?>" + id);
          console.log(data);                    
        },
        error: function(xhr, desc, err) {
            console.log(xhr.responseText);
        }
      })            
    }
})


</script>
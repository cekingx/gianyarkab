<title>Galeri Media</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Galeri Media
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" id="form_galeri" enctype="multipart/form-data" role="form">
            <div class="form-group">
              <label for="nama">Judul Galeri</label> 
              <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" placeholder = "Judul galeri">
              <span style="display: none;" class="form-text text-muted" id="need-judul" >
                Judul masih kosong
              </span> 
            </div>                    
            <div class="form-group">
              <label>Foto</label>
              <div></div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto_galeri" name = "foto_galeri[]" multiple="">
                <label class="custom-file-label" for="customFile">Choose file</label>      
              </div>
              <span style="display: none;" class="form-text text-muted" id="need-foto" >
                foto masih kosong
              </span> 
            </div>
            <div class="form-group">
              <label for="nama">ID Youtube Video</label> 
              <input type="text" class="form-control" id="video_galeri" name="video_galeri" placeholder = "Link video">
              <span style="display: none;" class="form-text text-muted" id="need-link" >
                ID masih kosong
              </span> 
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Galeri</label>
              <textarea class="form-control" name="deskripsi_galeri" id="deskripsi_galeri" rows="3" placeholder="Enter ..." required></textarea>
              <span style="display: none;" class="form-text text-muted" id="need-deskripsi" >
                Deskripsi masih kosong
              </span> 
            </div>                                      
            <button type="button" class="btn btn-success" id="validasi">Simpan</button>
            <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/galeri') ?>">Back</a>
        </form>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor-full/ckeditor.js');?>"></script>
<script type='text/javascript'>
$('.preloader').fadeOut();

$(function () {
        CKEDITOR.replace('deskripsi_galeri');
  });
</script>

<script type="text/javascript">

$('#judul_galeri').keyup( function() {
  if($('#judul_galeri').val() == '') {
      $('#judul_galeri').addClass('is-invalid');
      $('#need-judul').fadeIn(3);
  } else {
      $('#judul_galeri').removeClass('is-invalid');
      $('#need-judul').fadeOut(3);
  }
});  

$('#video_galeri').keyup( function() {
  if($('#video_galeri').val() == '') {
      $('#video_galeri').addClass('is-invalid');
      $('#need-link').fadeIn(3);
  } else {
      $('#video_galeri').removeClass('is-invalid');
      $('#need-link').fadeOut(3);
  }
});

$('#deskripsi_galeri').keyup( function() {
  if($('#deskripsi_galeri').val() == '') {
      $('#deskripsi_galeri').addClass('is-invalid');
      $('#need-deskripsi').fadeIn(3);
  } else {
      $('#deskripsi_galeri').removeClass('is-invalid');
      $('#need-deskripsi').fadeOut(3);
  }
});  


  $("#validasi").on('click',function(){
    // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var fileToUpload = $('input:file').val();
    var formData = new FormData($("#form_galeri")[0]);
    var galeriDesk = (CKEDITOR.instances['deskripsi_galeri'].getData());
    formData.append('deskripsi_galeri',CKEDITOR.instances['deskripsi_galeri'].getData());              
    
    if($('#judul_galeri').val() == '') {
      $('#judul_galeri').addClass('is-invalid');
      $('#need-judul').fadeIn(3);        
    }else if(galeriDesk == ''){
      $('#deskripsi_galeri').addClass('is-invalid');
      $('#need-deskripsi').fadeIn(3);
      console.log($('#deskripsi_galeri').val());
    }else if(fileToUpload == '' && $('#video_galeri').val() == ''){
      $('#foto_galeri').addClass('is-invalid');
      $('#need-foto').fadeIn(3);
      $('#video_galeri').addClass('is-invalid');
      $('#need-link').fadeIn(3);
    }else{
      $.ajax({
        url : '<?php echo site_url('admin/galeri/store') ?>',
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
<title>Edit Galeri</title>

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
            <input type="hidden" id="id_galeri" name="id" value="<?php echo $galeri->galeri_id ?>">
            <input type="hidden" id="slug_galeri" name="id" value="<?php echo $galeri->galeri_slug ?>">            
            <label for="nama">Judul Media</label> 
            <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" placeholder = "Judul Kegiatan" value="<?php echo $galeri->galeri_judul ?>" >
            <span style="display: none;" class="form-text text-muted" id="need-judul" >
              Judul masih kosong
            </span> 
          </div>
          <div class="form-group">
            <label for="kegiatan_isi">Deskripsi Media</label>
             <textarea class="form-control" name="deskripsi_galeri" id="deskripsi_galeri" rows="3" placeholder="Enter ..." required><?php echo $galeri->galeri_deskripsi ?></textarea>
            <span style="display: none;" class="form-text text-muted" id="need-deskripsi" >
              Deskripsi masih kosong
            </span> 
          </div>
          <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
            <input type="text" class="form-control" id="tanggal_galeri" placeholder="tanggal" name="tanggal_galeri" value = "<?php echo $galeri->galeri_tanggal ?>">
            <span style="display: none;" class="form-text text-muted" id="need-tanggal" >
              Tanggal masih kosong
            </span> 
          </div>                    
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/galeri') ?>">Back</a>
      </form>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type='text/javascript'>
$('.preloader').fadeOut();

$(function () {
     CKEDITOR.replace('deskripsi_galeri',{
      filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
      height: '400px' 
    });
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

$('#tanggal_galeri').keyup( function() {
  if($('#tanggal_galeri').val() == '') {
      $('#tanggal_galeri').addClass('is-invalid');
      $('#need-tanggal').fadeIn(3);
  } else {
      $('#tanggal_galeri').removeClass('is-invalid');
      $('#need-tanggal').fadeOut(3);
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
    var id = $('#id_galeri').val();
    var slug = $('#slug_galeri').val();
    var formData = new FormData($("#form_galeri")[0]);
    var galeriDesk = (CKEDITOR.instances['deskripsi_galeri'].getData());
    formData.append('deskripsi_galeri',CKEDITOR.instances['deskripsi_galeri'].getData());              
    
    if($('#judul_galeri').val() == '') {
      $('#judul_galeri').addClass('is-invalid');
      $('#need-judul').fadeIn(3);        
    }else if(galeriDesk == ''){
      $('#deskripsi_galeri').addClass('is-invalid');
      $('#need-deskripsi').fadeIn(3);      
    }else if($('#tanggal_galeri').val() == ''){
      $('#tanggal_galeri').addClass('is-invalid');
      $('#need-tanggal').fadeIn(3);      
    }else{
      $.ajax({
        url : '<?php echo site_url('admin/galeri/update/') ?>',
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
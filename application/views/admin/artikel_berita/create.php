<title>Artikel Berita</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Artikel Berita
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="form" id="form_artikel_berita" enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label for="artikel_berita_judul">Judul Artikel/Berita</label> 
              <input type="text" class="form-control" id="judul_artikel_berita" name="judul_artikel_berita" placeholder = "Judul artikel berita">
              <span style="display: none;" class="form-text text-muted" id="need-judul" >
                Judul Artikel/Berita masih kosong
              </span> 
          </div>
          <div class="form-group">
            <label>Foto Artikel/Berita</label>
            <div></div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="media_artikel_berita" name = "media_artikel_berita[]" multiple="">
              <label class="custom-file-label" for="customFile">Choose file</label>      
            </div>
            <span style="display: none;" class="form-text text-muted" id="need-foto" >
              Foto Artikel/Berita masih kosong
            </span> 
          </div>
          <div class="form-group">
            <label for="artikel_berita_isi">Isi Artikel/Berita</label>
             <textarea class="form-control" name="isi_artikel_berita" id="isi_artikel_berita" rows="3" placeholder="Enter ..." required></textarea>
            <span style="display: none;" class="form-text text-muted" id="need-isi" >
              Isi Artikel/Berita masih kosong
            </span> 
          </div>
          <div class="form-group">
            <label for="exampleSelectd">Jenis</label>
            <select class="form-control" id="exampleSelectd" name="jenis_artikel_berita" id="jenis_artikel_berita">
              <option value="3">Pilih ...</option>
              <option value="0">Artikel</option>
              <option value="1">Berita</option>                        
            </select>
            <span style="display: none;" class="form-text text-muted" id="need-jenis" >
              Jenis Artikel/Berita masih kosong
            </span>
          </div>                                    
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/artikel_berita') ?>">Back</a>
        </form>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type='text/javascript'>
$('.preloader').fadeOut();

$(function () {
     CKEDITOR.replace('isi_artikel_berita',{
      filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
      height: '200px' 
    });
 });
</script>

<script type="text/javascript">

$('#judul_artikel_berita').keyup( function() {
  if($('#judul_artikel_berita').val() == '') {
      $('#judul_artikel_berita').addClass('is-invalid');
      $('#need-judul').fadeIn(3);
  } else {
      $('#judul_artikel_berita').removeClass('is-invalid');
      $('#need-judul').fadeOut(3);
  }
});  

$('#isi_artikel_berita').keyup( function() {
  if($('#isi_artikel_berita').val() == '') {
      $('#isi_artikel_berita').addClass('is-invalid');
      $('#need-isi').fadeIn(3);
  } else {
      $('#isi_artikel_berita').removeClass('is-invalid');
      $('#need-isi').fadeOut(3);
  }
});


$("#validasi").on('click',function(){
    // e.preventDefault(); 
  // var data = $("#testForm").serialize();
    var formData = new FormData($("#form_artikel_berita")[0]);
    var fileToUpload = $('input:file').val();    
    var artikelIsi = (CKEDITOR.instances['isi_artikel_berita'].getData());
    var jenis = $('select').find('option:selected').val();
    formData.append('isi_artikel_berita',CKEDITOR.instances['isi_artikel_berita'].getData());              
    
    if($('#judul_artikel_berita').val() == '') {
      $('#judul_artikel_berita').addClass('is-invalid');
      $('#need-judul').fadeIn(3);
            
    }else if(artikelIsi == ''){
      $('#isi_artikel_berita').addClass('is-invalid');
      $('#need-isi').fadeIn(3);
          
    }else if(fileToUpload == ''){
      $('#media_artikel_berita').addClass('is-invalid');
      $('#need-foto').fadeIn(3);
       
    }else if(jenis == 3){
      $('#jenis_artikel_berita').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
           
    }
    else{
      $.ajax({
        url : '<?php echo site_url('admin/artikel_berita/store') ?>',
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
          // console.log($('#judul_artikel_berita').val());   
          // console.log(artikelIsi); 
          // console.log(fileToUpload);  
          // console.log(jenis);                
        }
      })            
    }
  })


</script>
<title>Laporan</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Laporan
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="form" id="form_laporan" enctype="multipart/form-data" role="form">
          <div class="form-group">
              <label for="nama">Nama Laporan</label> 
              <input type="text" class="form-control" id="laporan_nama" name="laporan_nama" placeholder = "Nama">
              <span style="display: none;" class="form-text text-muted" id="need-nama" >
                  Nama masih kosong
              </span> 
            </div>
            <div class="form-group">
              <label for="exampleSelectd">Jenis Laporan</label>
              <select class="form-control" id="laporan_jenis" name="laporan_jenis">
                <option value="">Pilih ...</option>
                <?php foreach ($jenis_laporan as $data) : ?>
                  <option value="<?php echo $data->jenis_laporan_id ?>"><?php echo $data->jenis_laporan_nama ?></option>
                <?php endforeach; ?>
              </select>
              <span style="display: none;" class="form-text text-muted" id="need-jenis" >
                Jenis Laporan masih kosong
              </span> 
            </div>
            <div class="form-group">
            <label>File Laporan</label>
              <div></div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="file_laporan" name = "file_laporan">
                <label class="custom-file-label" for="customFile">Choose file</label>                    
              </div>
              <span style="display: none;" class="form-text text-muted" id="need-file" >
                File Laporan masih kosong
              </span> 
            </div>                              
            <button type="button" class="btn btn-success" id="validasi">Simpan</button>
            <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/laporan') ?>">Back</a>          
        </form>
    </div>
</div>

<script type="text/javascript">
  $('.preloader').fadeOut();

$('#laporan_nama').keyup( function() {
  if($('#laporan_nama').val() == '') {
      $('#laporan_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);
  } else {
      $('#laporan_nama').removeClass('is-invalid');
      $('#need-nama').fadeOut(3);
  }
});  

$('#laporan_jenis').keyup( function() {
  if($('#laporan_jenis').val() == 999) {
      $('#laporan_jenis').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
  } else {
      $('#laporan_jenis').removeClass('is-invalid');
      $('#need-jenis').fadeOut(3);
  }
});  

$("#validasi").on('click',function(){
  // e.preventDefault(); 
  // var data = $("#testForm").serialize();    
    var fileToUpload = $('input:file').val();  
    var jenisLaporan = $('select').find('option:selected').val();
    var formData = new FormData($("#form_laporan")[0]);
    
    if($('#laporan_nama').val() == '') {
      $('#laporan_nama').addClass('is-invalid');
      $('#need-nama').fadeIn(3);        
    }else if(jenisLaporan == ''){
      $('#laporan_jenis').addClass('is-invalid');
      $('#need-jenis').fadeIn(3);
    }else if(fileToUpload == ''){
      $('#file_laporan').addClass('is-invalid');
      $('#need-file').fadeIn(3);
    }
    else{
      $.ajax({
        url : '<?php echo base_url('admin/laporan/store')?>',
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
<title>Edit Jenis Laporan</title>

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Jenis Laporan
            </h3>
        </div>
    </div>
    <div class="card-body">
         <form id="form_laporan" method="POST" enctype="multipart/form-data" role="form">
          <div class="form-group">                                            
              <label for="nama">Nama Laporan</label> 
              <input type="hidden" name="id_jenis" value="<?= $jenis_laporan->jenis_laporan_id ?>">
              <input type="text" class="form-control" id="jenis_nama" name="jenis_nama" placeholder = "Nama" value="<?= $jenis_laporan->jenis_laporan_nama ?>">
              <span style="display: none;" class="form-text text-muted" id="need-nama" >
                  Jenis masih kosong
              </span>                             
            </div>          
          <button type="button" class="btn btn-success" id="validasi">Simpan</button>
          <a type="button" class="btn btn-secondary" href ="<?php echo site_url('admin/laporan') ?>">Back</a>
      </form>
    </div>
</div>

<script type="text/javascript">
$('.preloader').fadeOut();

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
        url : '<?php echo site_url('admin/laporan/jenis/update/')?>',
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
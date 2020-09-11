<title>Edit Kegiatan</title>

<div class="card card-custom gutter-b">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        Kegiatan
      </h3>
    </div>
  </div>
    <div class="card-body">
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-custom alert-primary fade show" role="alert">
          <div class="alert-icon"><i class="flaticon-warning"></i></div>
          <div class="alert-text"><?php echo $this->session->flashdata('success'); ?></div>
          <div class="alert-close">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="ki ki-close"></i></span>
              </button>
          </div> 
        </div>                                     
      <?php endif; ?>
      <form method="POST" id="form_kegiatan" enctype="multipart/form-data" role="form">
          <div class="card-body">
              <!-- begin::input-judul -->
              <div class="form-group">
                <label>Judul Kegiatan</label>
                <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="<?= $kegiatan->kegiatan_id ?>">
                <input type="hidden" name="slug_kegiatan" id="slug_kegiatan" value="<?= $kegiatan->kegiatan_slug ?>">
                  <input type="text" class="form-control form-control-solid" placeholder="Judul" name="judul_kegiatan" id="judul_kegiatan" value="<?= $kegiatan->kegiatan_judul ?>" />
                  <span style="display: none;" class="form-text text-muted" id="need-judul" >
                    Judul masih kosong
                  </span>
              </div>
              <!-- end::input-judul -->
              <!-- begin::input-isi -->
              <div class="form-group">
                <label>Isi Pengumuman</label>
                  <textarea class="form-control <?php echo form_error('isi_kegiatan') ? 'is-invalid':'' ?>" name="isi_kegiatan" id="isi_kegiatan" rows="3" placeholder="Enter ..." required><?= $kegiatan->kegiatan_deskripsi?></textarea>
                  <span style="display: none;" class="form-text text-muted" id="need-isi" >
                      Isi masih kosong
                  </span>
              </div>
              <!-- end::input-isi -->
               <!-- begin::input-tanggal -->
              <div class="form-group">
                <label>Tanggal</label>                
                  <input type="text" class="form-control form-control-solid" placeholder="Judul" name="tanggal" id="tanggal" value="<?= $kegiatan->kegiatan_tanggal ?>" />
                  <span style="display: none;" class="form-text text-muted" id="need-tanggal" >
                    Tanggal masih kosong
                  </span>
              </div>
              <!-- end::input-tanggal -->
          </div>
          <div class="card-footer">
              <button type="button" class="btn btn-primary mr-2" id="validasi">
                  Submit
              </button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
      </form>
  </div>
</div>


<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor-full/ckeditor.js');?>"></script>
<script type='text/javascript'>
$('.preloader').fadeOut();
var baseUrl = '<?= base_url() ?>';
$(function () {
        CKEDITOR.replace('isi_kegiatan');
  });

    $('#judul_kegiatan').keyup( function() {
        if($('#judul_kegiatan').val() == '') {
            $('#judul_kegiatan').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#judul_kegiatan').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });

    $('#tanggal').keyup( function() {
        if($('#tanggal').val() == '') {
            $('#tanggal').addClass('is-invalid');
            $('#need-tanggal').fadeIn(3);
        } else {
            $('#tanggal').removeClass('is-invalid');
            $('#need-tanggal').fadeOut(3);
        }
    });    

    $('#validasi').on('click', function() {
        var formData = new FormData($("#form_kegiatan")[0]);
        var isi_kegiatan = (CKEDITOR.instances['isi_kegiatan'].getData());
        formData.append('isi_kegiatan',CKEDITOR.instances['isi_kegiatan'].getData());  

        if($('#judul_kegiatan').val() == '') {
            $('#judul_kegiatan').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        }else if(isi_kegiatan == '') {
            $('#need-isi').fadeIn(3);
        }else if ($('#tanggal').val() == ''){
            $('#tanggal').addClass('is-invalid');
            $('#need-tanggal').fadeIn(3);
        } 
        else {
           $.ajax({
              url : '<?php echo base_url('admin/kegiatan/update')?>',
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
      });

</script>
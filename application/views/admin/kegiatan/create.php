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
      <form  method="POST" id="testForm" enctype="multipart/form-data" role="form">
          <div class="card-body">
              <!-- begin::input-judul -->
              <div class="form-group">
                <label>Judul Kegiatan</label>
                  <input type="text" class="form-control form-control-solid" placeholder="Judul" name="judul" id="kegiatan_judul"/>
                  <span style="display: none;" class="form-text text-muted" id="need-judul" >
                    Judul masih kosong
                  </span>
              </div>
              <!-- end::input-judul -->
              <!-- begin::input-isi -->
              <div class="form-group">
                <label>Isi Pengumuman</label>
                  <textarea class="form-control <?php echo form_error('isi_kegiatan') ? 'is-invalid':'' ?>" name="isi_kegiatan" id="isi_kegiatan" rows="3" placeholder="Enter ..." required></textarea>
                  <span style="display: none;" class="form-text text-muted" id="need-isi" >
                      Isi masih kosong
                  </span>
              </div>
              <!-- end::input-isi -->
          </div>
          <div class="card-footer">
              <button type="button" class="btn btn-primary mr-2" id="btn-save">
                  Submit
              </button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
      </form>
  </div>
</div>


<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type='text/javascript'>
$('.preloader').fadeOut();
var baseUrl = '<?= base_url() ?>';
$(function () {
     CKEDITOR.replace('isi_kegiatan',{
      filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
      height: '400px' 
    });
 });

    $('#kegiatan_judul').keyup( function() {
        if($('#kegiatan_judul').val() == '') {
            $('#kegiatan_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else {
            $('#kegiatan_judul').removeClass('is-invalid');
            $('#need-judul').fadeOut(3);
        }
    });    

    $('#btn-save').click( function() {
        var isi_kegiatan = CKEDITOR.instances.isi_kegiatan.getData();

        if($('#kegiatan_judul').val() == '') {
            $('#kegiatan_judul').addClass('is-invalid');
            $('#need-judul').fadeIn(3);
        } else if(isi_kegiatan == '') {
            $('#need-isi').fadeIn(3);
        } else {
            // $('.preloader').fadeIn();
            var data = $("#testForm").serialize();
            $.ajax({
                url : baseUrl + 'admin/banner/store',
                type : 'POST',
                dataType : 'json',
                data : data,
                success: function(data){
                if(data !== 'sukses') {
                  $(".judul-error").html(data.judul);
                  $(".tanggal-error").html(data.tanggal);
                }
                else {
                  getUser();        
                  $("#judul").val("");
                  $("#tanggal").val("");
                  $("#hasil").html(success);
                }
              }
          });
        }
    });

</script>
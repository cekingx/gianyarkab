<title><?= $artikel_berita->artikel_berita_judul ?></title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Baca Artikel
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="h1 text-center"><?= $artikel_berita->artikel_berita_judul ?></div>
                    </div>

                    <!--begin::Footer-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        <!--begin::Container-->
                        <div
                            class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-dark font-weight-bold mr-2"> <?= date('d F, Y (l)', strtotime($artikel_berita->artikel_berita_tanggal)) ?></span>

                            </div>
                            <!--end::Copyright-->

                            <!--begin::Nav-->
                            <?php $this->load->view('user-views/layouts/partials/sosial') ?>

                            <!--end::Nav-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->

                    <!--begin::Engage Widget 4-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        <div id="gallery" style="display:none;">
                            <?php foreach($foto as $data): ?>
                                <img alt="Preview Image 1" src="<?= base_url('assets/upload/artikel_berita/'.$data->artikel_berita_media_media) ?>" data-image="<?= base_url('assets/upload/artikel_berita/'.$data->artikel_berita_media_media) ?>"
                                data-description="Preview Image 1 Description">
                            <?php endforeach; ?>    
                        </div>
                        <!--end::Engage Widget 4-->
                    </div>

                    <div class="card-body">
                        <p>
                            <?= $artikel_berita->artikel_berita_isi ?>
                        </p>
                    </div>
                </div>


            </div>
            <?php $this->load->view('user-views/layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery("#gallery").unitegallery({
            theme_enable_text_panel: false
        });

    });
</script>
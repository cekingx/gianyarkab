<title>Dashboard | SKM Kab. Gianyar</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-6 " style="margin-bottom: 30px;">
                <div>
                    <!--begin::Engage Widget 4-->
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php foreach($carousels as $key => $carousel): ?>
                            <li 
                                data-target="#carouselExampleCaptions" 
                                data-slide-to="<?= $key?>" 
                                <?php if($key == 0): ?>class="active"<?php endif; ?>></li>
                        <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                        <?php foreach($carousels as $key => $carousel): ?>
                            <div class="carousel-item <?php if($key == 0): ?>active<?php endif; ?>">
                                <a href="<?= $carousel['carousel_link'] ?>">
                                    <img src="<?= base_url('assets/upload/carousel/') . $carousel['carousel_foto'] ?>" class="d-block w-100  rounded" alt="...">
                                    <div class="carousel-caption  d-md-block">
                                        <h5><?= $carousel['carousel_judul'] ?></h5>
                                        <p><?= $carousel['carousel_caption'] ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--end::Engage Widget 4-->
                </div>
            </div>
            <div class="col-xl-6" style="margin-top: 0px;">
                <!--begin::Tiles Widget 13-->
                <?php foreach($banner_besar as $data): ?>
                <div class="card card-custom bgi-no-repeat gutter-b"
                    style="height: auto; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(assets/media/svg/patterns/taieri.svg)">
                    <a href="google.com">
                        <!--begin::Body-->
                        <img src="<?= base_url('/assets/upload/banner/'.$data->banner_file) ?>" class="d-block w-100 rounded" alt="...">
                    </a>
                    <!--end::Body-->
                </div>
                <?php endforeach; ?>
                <!--end::Tiles Widget 13-->

                <div class="row">
                    <?php foreach($banner_kecil as $data): ?>
                    <div class="col-xl-6">                        
                        <!--begin::Engage Widget 4-->
                        <div class="card card-custom bgi-no-repeat gutter-b"
                            style="height: auto; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(assets/media/svg/patterns/taieri.svg)">
                            <a href="google.com">

                                <!--begin::Body-->
                                <img src="<?= base_url('/assets/upload/banner/'.$data->banner_file) ?>" class="d-block w-100 rounded" alt="...">
                            </a>
                            <!--end::Body-->
                        </div>                        
                        <!--end::Engage Widget 4-->
                    </div>
                    <?php endforeach; ?>                    

                    <div class="col-xl-6">
                        <!--begin::Engage Widget 4-->
                        <div class="card card-custom bgi-no-repeat gutter-b"
                            style="height: auto; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(assets/media/svg/patterns/taieri.svg)">
                            <a href="google.com">

                                <!--begin::Body-->
                                <img src="assets/user-assets/img/ppid.jpg" class="d-block w-100 rounded" alt="...">
                            </a>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage Widget 4-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Engage Widget 4-->
                        <div class="card card-custom bgi-no-repeat gutter-b"
                            style="height: auto; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(assets/media/svg/patterns/taieri.svg)">
                            <a href="google.com">

                                <!--begin::Body-->
                                <img src="assets/user-assets/img/paswara.jpg" class="d-block w-100 rounded" alt="...">
                            </a>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage Widget 4-->
                    </div>
                </div>
                <!--end::Row-->

                <div class="row">

                </div>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin::Engage Widget 4-->
                        <div class=" card card-custom card-stretch gutter-b">
                            <div class="bg-gray-50 card card-custom">
                                <div class="card-header ribbon ribbon-right">
                                    <div class="ribbon-target bg-primary" style="top: 12px; right: -5px;">
                                        <h2>PENGUMUMAN</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Widget 15-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel"
                                            aria-labelledby="kt_tab_pane_2_2">
                                            <!--begin::Form-->
                                            <div class="form">
                                                <?php foreach($pengumuman as $pengumuman): ?>
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center ">
                                                    <!--begin::Section-->
                                                    <div class="d-flex flex-column flex-grow-1">
                                                        <!--begin::Title-->
                                                        <a href="<?= base_url('pengumuman/') . $pengumuman['pengumuman_slug'] ?>"
                                                            class="text-dark-75 font-weight-bolder font-size-lg text-hover-primary mb-1"><?= $pengumuman['pengumuman_judul'] ?></a>
                                                        <!--end::Title-->
                                                        <span
                                                            class="text-dark-50 font-weight-normal  text-right font-size-sm">
                                                            <?= parseDate($pengumuman['pengumuman_tanggal']); ?>
                                                        </span>

                                                        <div class="separator separator-solid separator-border-3"></div>

                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Item-->
                                                <?php endforeach; ?>
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Tap pane-->
                                    </div>
                                    <!--end::Widget 15-->

                                    <a href="<?php echo site_url('/pengumuman') ?>"
                                        class="text-dark font-weight-bolder font-size-lg text-hover-secondary mb-1">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Engage Widget 4-->

                    </div>
                    <div class="col-xl-6">
                        <!--begin::Engage Widget 4-->
                        <div class=" card card-custom card-stretch gutter-b">
                            <div class="bg-gray-50 card card-custom">
                                <div class="card-header ribbon ribbon-right">
                                    <div class="ribbon-target bg-primary" style="top: 12px; right: -5px;">
                                        <h2>AGENDA KEGIATAN</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin::Widget 15-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel"
                                            aria-labelledby="kt_tab_pane_2_2">
                                            <!--begin::Form-->
                                            <div class="form">
                                                <!--begin::Item-->
                                                <?php foreach($kegiatan as $data): ?>
                                                <div class="d-flex align-items-center ">
                                                    <!--begin::Section-->
                                                    <div class="d-flex flex-column flex-grow-1">
                                                        <!--begin::Title-->
                                                        <a href="<?php echo site_url('arsip/kegiatan/'.$data->kegiatan_slug) ?>"
                                                            class="text-dark-75 font-weight-bolder font-size-lg text-hover-primary mb-1"><?= $data->kegiatan_judul ?></a>
                                                        <!--end::Title-->
                                                        <span
                                                            class="text-dark-50 font-weight-normal  text-right font-size-sm">
                                                            <?= date('d F, Y', strtotime($data->kegiatan_tanggal)) ?>
                                                        </span>

                                                        <div class="separator separator-solid separator-border-3"></div>

                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <?php endforeach; ?>
                                                <!--end::Item-->                                                
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Tap pane-->
                                    </div>
                                    <!--end::Widget 15-->

                                    <a href="<?php echo site_url('arsip/kegiatan') ?>"
                                        class="text-dark font-weight-bolder font-size-lg text-hover-secondary mb-1">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Engage Widget 4-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6" style="
    margin-bottom: 20px;
">
                        <!--begin::Engage Widget 4-->
                        <a class="twitter-timeline" data-height="700"
                            href="https://twitter.com/PemkabGianyar?ref_src=twsrc%5Etfw">Tweets by PemkabGianyar</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <!--end::Engage Widget 4-->

                    </div>
                    <div class="col-xl-6">
                        <!--begin::Engage Widget 4-->
                        <div class=" card card-custom card-stretch gutter-b"
                            style="align-item-center margin-top: 25px;">
                            <div class="container" style="
                                    padding-top: 25px;
                                    padding-bottom: 25px;
                                ">
                                <div class="fb-page " style="align-item-center"
                                    data-href="https://www.facebook.com/pemkabgianyar/" data-tabs="timeline"
                                    data-width="" data-height="650px" data-small-header="false"
                                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/pemkabgianyar/"
                                        class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/pemkabgianyar/">Pemerintah Kabupaten
                                            Gianyar</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <!--end::Engage Widget 4-->

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
<script>
    $(function () {
        $('.fb-page').rwd();
    });
</script>
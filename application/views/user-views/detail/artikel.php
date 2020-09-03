<title>detail artikel</title>
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
                        <div class="h1 text-center">Siaran Pers - Kabupaten Gianyar terpilih sebagai Anggota Organisasi
                            Kota Pusaka Dunia</div>
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
                                <span class="text-dark font-weight-bold mr-2">Jumat, 20 Juli 2020</span>

                            </div>
                            <!--end::Copyright-->

                            <!--begin::Nav-->
                            <?php $this->load->view('layouts/partials/sosial') ?>

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

                            <img alt="Preview Image 1" src="images/thumbs/thumb1.jpg" data-image="images/big/image1.jpg"
                                data-description="Preview Image 1 Description">

                            <img alt="Preview Image 2" src="images/thumbs/thumb2.jpg" data-image="images/big/image2.jpg"
                                data-description="Preview Image 2 Description">

                            <img alt="Youtube Video" data-type="youtube" data-videoid="A3PDXmYoF5U"
                                data-description="You can include youtube videos easily!">

                            <img alt="Preview Image 3" src="images/thumbs/thumb3.jpg" data-image="images/big/image3.jpg"
                                data-description="Preview Image 3 Description">

                            <img alt="Vimeo Video" data-type="vimeo"
                                src="http://i.vimeocdn.com/video/447294219_200x150.jpg"
                                data-image="http://i.vimeocdn.com/video/447294219_640.jpg" data-videoid="73234449"
                                data-description="This gallery can also play vimeo videos!">

                            <img alt="Preview Image 4" src="images/thumbs/thumb4.jpg" data-image="images/big/image4.jpg"
                                data-description="Preview Image 4 Description">

                            <img alt="Html5 Video" src="images/thumbs/html5_video.png" data-type="html5video"
                                data-image="http://vjs.zencdn.net/v/oceans.png"
                                data-videoogv="http://vjs.zencdn.net/v/oceans.ogv"
                                data-videowebm="http://vjs.zencdn.net/v/oceans.webm"
                                data-videomp4="http://vjs.zencdn.net/v/oceans.mp4"
                                data-description="This is html5 video demo played by mediaelement2 player">

                            <img alt="Preview Image 5" src="images/thumbs/thumb1.jpg" data-image="images/big/image1.jpg"
                                data-description="Preview Image 5 Description">

                            <img alt="Wistia Video" src="images/thumbs/wistia_video.jpg" data-type="wistia"
                                data-image="images/big/wistia_video.jpg" data-videoid="9oedgxuciv"
                                data-description="Hey, the gallery plays Wistia videos too!">

                            <img alt="Preview Image 6" src="images/thumbs/thumb2.jpg" data-image="images/big/image2.jpg"
                                data-description="Preview Image 6 Description">


                            <img alt="Sound Cloud Track" src="images/thumbs/sound_cloud.jpg" data-type="soundcloud"
                                data-image="images/thumbs/sound_cloud.jpg" data-trackid="8390970"
                                data-description="This gallery can play a soundcloud track">


                            <img alt="Preview Image 7" src="images/thumbs/thumb3.jpg" data-image="images/big/image3.jpg"
                                data-description="Preview Image 7 Description">


                            <img alt="Preview Image 8" src="images/thumbs/thumb4.jpg" data-image="images/big/image4.jpg"
                                data-description="Preview Image 8 Description">

                            <img alt="Preview Image 9" src="images/thumbs/thumb1.jpg" data-image="images/big/image1.jpg"
                                data-description="Preview Image 9 Description">

                            <img alt="Preview Image 10" src="images/thumbs/thumb2.jpg"
                                data-image="images/big/image2.jpg" data-description="Preview Image 10 Description">

                            <img alt="Preview Image 11" src="images/thumbs/thumb3.jpg"
                                data-image="images/big/image3.jpg" data-description="Preview Image 11 Description">

                        </div>
                        <!--end::Engage Widget 4-->
                    </div>

                    <div class="card-body">
                        <p>
                            asddddddddddddddddddddddddddddddddddddddd
                        </p>
                    </div>
                </div>


            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>

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
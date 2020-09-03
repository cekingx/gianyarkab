<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
        <!--begin::Header Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(1) == '') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/') ?>" class="menu-link">
                    <span class="menu-text">Beranda</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item  menu-item-submenu menu-item-rel <?php if ($this->uri->segment(1) == 'sejarah' or $this->uri->segment(1) == 'petakabupaten' or $this->uri->segment(1) == 'artilambang' or $this->uri->segment(1) == 'gianyardalamangka' or $this->uri->segment(1) == 'bupatidarimasa') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Profile</span><i
                        class="menu-arrow"></i></a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                    <ul class="menu-subnav">
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/sejarah') ?>"
                                class="menu-link" class="menu-link "><span class="menu-text">Sejarah</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/petakabupaten') ?>"
                                class="menu-link "><span class="menu-text">Peta Kabupaten Gianyar</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/artilambang') ?>"
                                class="menu-link" class="menu-link "><span class="menu-text">Arti Lambang</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a
                                href="<?php echo site_url('/gianyardalamangka') ?>" class="menu-link "><span
                                    class="menu-text">Gianyar Dalam Angka 2014</span><span class="menu-desc"></span></a>
                        </li>
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/bupatidarimasa') ?>"
                                class="menu-link "><span class="menu-text">Bupati dari Masa ke Masa</span><span
                                    class="menu-desc"></span></a></li>
                    </ul>
                </div>
            </li>
            <li class="menu-item  menu-item-submenu menu-item-rel <?php if ($this->uri->segment(1) == 'visidanmisi' or $this->uri->segment(1) == 'alamatinstansi' or $this->uri->segment(1) == 'perangkatdaerah' or $this->uri->segment(1) == 'laporan') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">                
                <a href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Pemerintahan</span><i
                        class="menu-arrow"></i></a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                    <ul class="menu-subnav">
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/visidanmisi') ?>"
                                class="menu-link" class="menu-link "><span class="menu-text">Visi dan Misi</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a
                                href="<?php echo site_url('/tujuandansasaran') ?>" class="menu-link "><span
                                    class="menu-text">Tujuan dan Sasaran</span><span class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a
                                href="<?php echo site_url('/strukturorganisasi') ?>" class="menu-link"
                                class="menu-link "><span class="menu-text">Struktur Organisasi</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/alamatinstansi') ?>"
                                class="menu-link"><span class="menu-text">Alamat Instansi</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true"><a
                                href="javascript:;" class="menu-link menu-toggle">
                                </span><span class="menu-text">Perangkat Daerah</span><i class="menu-arrow"></i></a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                <ul class="menu-subnav">
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/bupati') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Bupati</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/wakilbupati') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Wakil Bupati</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/sekretariatdaerah') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Sekretariat Daerah</span></a>
                                    </li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/sekretariatdewan') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Sekretariat Dewan</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/inspektorat') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Inspektorat</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/bappenda') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Bappenda</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/dinasdaerah') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Dinas Daerah</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/kecamatan') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Kecamatan</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/badan') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Badan</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true"><a
                                href="javascript:;" class="menu-link menu-toggle">
                                </span><span class="menu-text">Laporan</span><i class="menu-arrow"></i></a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                <ul class="menu-subnav">
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/lakip') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">LAKIP</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/perjanjiankinerja') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Perjanjian Kinerja</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/rencanaaksi') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Rencana Aksi</span></a>
                                    </li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/renstra') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">RENSTRA</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/renja') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">RENJA</span></a></li>
                                    <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/iku') ?>"
                                            class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">IKU</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item  menu-item-submenu menu-item-rel <?php if ($this->uri->segment(1) == 'berita' or $this->uri->segment(1) == 'artikel' or $this->uri->segment(1) == 'koranpaswara' or $this->uri->segment(1) == 'pariwisata' or $this->uri->segment(1) == 'teleponpenting') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">                
                <a href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Info Gianyar</span><i
                        class="menu-arrow"></i></a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                    <ul class="menu-subnav">
                        <li class="menu-item " aria-haspopup="true"><a href="<?php echo site_url('/berita') ?>"
                                class="menu-link" class="menu-link "><span class="menu-text">Berita</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a 
                                href="<?php echo site_url('/artikel') ?>"
                                class="menu-link "><span class="menu-text">Artikel</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true"><a
                                href="javascript:;" class="menu-link menu-toggle">
                                </span><span class="menu-text">Media Cetak</span><i class="menu-arrow"></i></a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                <ul class="menu-subnav">
                                    <li class="menu-item " aria-haspopup="true"><a
                                            href="<?php echo site_url('/koranpaswara') ?>" class="menu-link "><i
                                                class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Koran PASWARA</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item " aria-haspopup="true"><a href="http://diparda.gianyarkab.go.id/" target="_blank"
                                class="menu-link" class="menu-link "><span class="menu-text">Pariwisata</span><span
                                    class="menu-desc"></span></a></li>
                        <li class="menu-item " aria-haspopup="true"><a 
                                href="<?php echo site_url('/teleponpenting') ?>"
                                class="menu-link "><span class="menu-text">Telepon Penting</span><span
                                    class="menu-desc"></span></a></li>

                </div>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(1) == 'perijinan') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">
                <a href="http://dpmptsp.gianyarkab.go.id/"  target="_blank" class="menu-link">
                    <span class="menu-text">Perijinan</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(1) == 'subdomain') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/subdomain') ?>" class="menu-link">
                    <span class="menu-text">Sub Domain</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(1) == 'kontak') : ?>menu-item-here<?php endif; ?>"
                data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/kontak') ?>" class="menu-link">
                    <span class="menu-text">Kontak</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </ul>
        <!--end::Header Nav-->
    </div>
    <!--end::Header Menu-->
</div>
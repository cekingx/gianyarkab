<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
        <!--begin::Header Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(1) == '') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/') ?>" class="menu-link">
                    <span class="menu-text">Dashboard</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(2) == 'pengumuman') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/admin/pengumuman') ?>" class="menu-link">
                    <span class="menu-text">Pengumuman</span>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(2) == 'jabatan-bupati') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/admin/jabatan-bupati') ?>" class="menu-link">
                    <span class="menu-text">Jabatan Bupati</span>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(2) == 'alamat-instansi') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/admin/alamat-instansi') ?>" class="menu-link">
                    <span class="menu-text">Alamat Instansi</span>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(2) == 'subdomain') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/admin/subdomain') ?>" class="menu-link">
                    <span class="menu-text">Sub Domain</span>
                </a>
            </li>
            <li class="menu-item menu-item-rel <?php if ($this->uri->segment(2) == 'hubungi-kami') : ?>menu-item-here<?php endif; ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?php echo site_url('/admin/hubungi-kami') ?>" class="menu-link">
                    <span class="menu-text">Kontak</span>
                </a>
            </li>
        </ul>
        <!--end::Header Nav-->
    </div>
    <!--end::Header Menu-->
</div>
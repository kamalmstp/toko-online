<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $blogdetail->metatitle;?> | <?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#825a2c">
    <meta name="msapplication-navbutton-color" content="#825a2c">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" charset="#825a2c">
    <meta name="keywords" content="<?php echo $blogdetail->metatag;?>" />
    <meta name="description" content="<?php echo $blogdetail->metadesc;?>"/>

    <link rel="icon" type="image/png" href="<?php echo base_url('asset/img/uploads/banner/') ?><?php if(!empty($icontitle->image)){echo $icontitle->image;}?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/bootstrap2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/elegant-font/html-css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendors/sweetalert/sweetalert.css">
</head>
<body class="animsition">
    <div class="wrap_header fixed-header2 trans-0-4">
        <a href="<?php echo base_url('') ?>" class="logo">
            <img src="<?php echo site_url('asset/img/uploads/banner/' . $logo->image . ''); ?>" alt="<?php echo $profile->companyName;?>">
        </a>
        <div class="wrap_menu">
            <nav class="menu">
                <ul class="main_menu">
                    <li class="<?php echo $activemenu['home']; ?>">
                        <a href="<?php echo base_url(''); ?>">Home</a>
                    </li>
                    <li class="<?php echo $activemenu['product']; ?>">
                        <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=') ?>">Produk</a>
                        <?php echo $menucategory; ?>
                    </li>
                    <li  class="<?php echo $activemenu['sale']; ?>">
                        <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=sale'); ?>">Diskon</a>
                    </li>
                    <li class="<?php echo $activemenu['payment']; ?>">
                        <a href="<?php echo base_url('pages/confirm-payment') ?>">Konfirmasi Pembayaran</a>
                    </li>
                    <li class="<?php echo $activemenu['blog']; ?>">
                        <a href="<?php echo base_url('pages/blog'); ?>">Blog</a>
                    </li>
                    <li class="<?php echo $activemenu['gallery']; ?>">
                        <a href="<?php echo base_url('pages/gallery'); ?>">Gallery</a>
                    </li>
                    <li class="<?php echo $activemenu['cekresi']; ?>">
                        <a href="<?php echo base_url('pages/cekresi'); ?>">Cek Resi</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i> Cari Produk</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-icons">
            <?php
            if (!empty($this->session->userdata('username'))) {
                echo '<a href="' . base_url('pages/profile') . '" class="header-wrapicon1 dis-block">';
                echo "<small class='color0'><img src=" . base_url('asset/img/icons/icon-header-012.png') . " alt='ICON'> " . substr($this->session->userdata('username'), 0, 7) . "</small>";
                echo "</a>";
            } else {
                ?>
                <a href="<?php echo base_url('pages/login') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-012.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                </a>
            <?php } ?>
            <span class="linedivide1"></span>
            <div class="header-wrapicon2">
                <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-022.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti" id="qty-cart-a"></span>
                <div class="header-cart header-dropdown">
                    <div  id="list-cart-a"></div>
                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <a href="<?php echo base_url('pages/cart?idorder='); ?><?php
                            if (isset($_SESSION['idorder'])) {
                                echo $_SESSION['idorder'];
                            }
                            ?>" class="flex-c-m size1 bg-green bo-rad-20 hov1 s-text1 trans-0-4">
                            Keranjang Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header2">
    <div class="container-menu-header-v2">
        <div class="wrap_header box-border-bottom">
            <a href="<?php echo base_url('') ?>" class="logo">
                <img src="<?php echo site_url('asset/img/uploads/banner/' . $logo->image . ''); ?>" alt="IMG-LOGO">
            </a>
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li class="<?php echo $activemenu['home']; ?>">
                            <a href="<?php echo base_url(''); ?>">Home</a>
                        </li>
                        <li class="<?php echo $activemenu['product']; ?>">
                            <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=') ?>">Product</a>
                            <?php echo $menucategory; ?>
                        </li>
                        <li  class="<?php echo $activemenu['sale']; ?>">
                            <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=sale') ?>">Diskon</a>
                        </li>
                        <li class="<?php echo $activemenu['payment']; ?>">
                            <a href="<?php echo base_url('pages/confirm-payment') ?>">Konfirmasi Pembayaran</a>
                        </li>
                        <li class="<?php echo $activemenu['blog']; ?>">
                            <a href="<?php echo base_url('pages/blog'); ?>">Blog</a>
                        </li>
                        <li class="<?php echo $activemenu['gallery']; ?>">
                            <a href="<?php echo base_url('pages/gallery'); ?>">Gallery</a>
                        </li>
                        <li class="<?php echo $activemenu['cekresi']; ?>">
                            <a href="<?php echo base_url('pages/cekresi'); ?>">Cek Resi</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i> Cari Produk</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-icons">
                <?php
                if (!empty($this->session->userdata('username'))) {
                    echo '<a href="' . base_url('pages/profile') . '" class="header-wrapicon1 dis-block">';
                    echo "<small class='color0'><img src=" . base_url('asset/img/icons/icon-header-012.png') . " alt='ICON'> " . substr($this->session->userdata('username'), 0, 7) . "</small>";
                    echo "</a>";
                } else {
                    ?>
                    <a href="<?php echo base_url('pages/login') ?>" class="header-wrapicon1 dis-block">
                        <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-012.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    </a>
                <?php } ?>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2 m-r-13">
                    <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-022.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti" id="qty-cart-b"></span>
                    <div class="header-cart header-dropdown">
                        <div id="list-cart-b"></div>
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <a href="<?php echo base_url('pages/cart?idorder='); ?><?php
                                if (isset($_SESSION['idorder'])) {
                                    echo $_SESSION['idorder'];
                                }
                                ?>" class="flex-c-m size1 bg-green bo-rad-20 hov1 s-text1 trans-0-4">
                                Keranjang Belanja
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap_header_mobile fixed-top box-border-bottom">
    <a href="<?php echo base_url('') ?>" class="logo-mobile">
        <img src="<?php echo site_url('asset/img/uploads/banner/' . $logo->image . ''); ?>" alt="IMG-LOGO">
    </a>
    <div class="btn-show-menu">
        <div class="header-icons-mobile">
            <?php
            if (!empty($this->session->userdata('username'))) {
                echo '<a href="' . base_url('pages/profile') . '" class="header-wrapicon1 dis-block">';
                echo "<small class='color0'><img src=" . base_url('asset/img/icons/icon-header-012.png') . " alt='ICON'> " . substr($this->session->userdata('username'), 0, 7) . "</small>";
                echo "</a>";
            } else {
                ?>
                <a href="<?php echo base_url('pages/login') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-012.png" class="header-icon1" alt="ICON">
                </a>
            <?php } ?>
            <span class="linedivide2"></span>
            <div class="header-wrapicon2">
                <img src="<?php echo site_url('asset/img/') ?>icons/icon-header-022.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti" id="qty-cart-c"></span>
                <div class="header-cart header-dropdown">
                    <div  id="list-cart-c"></div>
                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <a href="<?php echo base_url('pages/cart?idorder='); ?><?php
                            if (isset($_SESSION['idorder'])) {
                                echo $_SESSION['idorder'];
                            }
                            ?>" class="flex-c-m size1 bg-green bo-rad-20 hov1 s-text1 trans-0-4">
                            Keranjang Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>
</div>
<div class="wrap-side-menu fixed-top"  style="z-index: 9999; margin-top: 80px;">
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-menu-mobile">
                <a href="<?php echo base_url(''); ?>">Home</a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=') ?>">Product</a>
            </li>
            <li  class="item-menu-mobile">
                <a href="<?php echo base_url('pages/product/search?category=0&price=asc&group=sale'); ?>">Diskon</a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('pages/confirm-payment') ?>">Konfirmasi Pembayaran</a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('pages/blog'); ?>">Blog</a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('pages/gallery'); ?>">Gallery</a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('pages/cekresi'); ?>">Cek Resi</a>
            </li>
            <li class="item-menu-mobile">
                <a href="javascript:void(0);" class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i> Cari Produk</a>
            </li>
        </ul>
    </nav>
</div>
</header>
<div id="formsearchbox" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">
        <div id="prefetch">
            <form method="GET" class="searchglobal" action="<?php echo base_url('pages/product-search/p'); ?>">
                <input type="text" class="searchglobalinput" placeholder="Cari Nama Produk.." name="search" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
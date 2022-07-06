<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <base href="<?php echo base_url(); ?>" />
        <title><?php echo $title == "" ? $common_lang["title"] : $title ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
        <link type="image/x-icon" href="<?php echo base_url(); ?>logo.ico" rel="icon" />
        <link type="image/x-icon" href="<?php echo base_url(); ?>logo.ico" rel="shortcut icon" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="og:title" property="og:title" content="<?php echo $common_lang["metatitle"] ?>">
        <meta name="keywords" content="<?php echo $common_lang['keyword'] ?>" />
        <meta name="description" content="<?php echo $common_lang["description"] ?>" />
        <meta name="robots" content="index,follow,noodp" /><meta name="robots" content="noarchive">
        <meta name="language" content="vietnamese" />

        <!-- bootstrap -->
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jquery-1.11.1.min.js"></script>

        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>common.css" rel='stylesheet' type='text/css' media="all" />
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>style.css" rel='stylesheet' type='text/css' media="all" />
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>phone.css" rel='stylesheet' type='text/css' media="all" />

        <!--start-smoth-scrolling-->
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jQuery.scrollSpeed.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>font-awesome4.7/css/font-awesome.min.css" />
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>bootstrap.min.js"></script>  
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>common.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jssor.slider-27.5.0.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jquery.slimscroll.js" type="text/javascript" ></script>
        <script type="text/javascript">
            jssor_1_slider_init = function () {

                var jssor_1_SlideshowTransitions = [
                    {$Duration: 800, $Opacity: 2}
                ];

                var jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                /*#region responsive code begin*/

                var MAX_WIDTH = 889;

                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();

                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            };
        </script>
        <script type="text/javascript">
            jssor_2_slider_init = function () {

                var jssor_2_SlideshowTransitions = [
                    {$Duration: 800, $Opacity: 2}
                ];

                var jssor_2_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_2_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };

                var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);

                /*#region responsive code begin*/

                var MAX_WIDTH = 1200;

                function ScaleSlider() {
                    var containerElement = jssor_2_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_2_slider.$ScaleWidth(expectedWidth);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();

                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            };
        </script>
        <style>
            /*jssor slider loading skin spin css*/
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            /*jssor slider bullet skin 051 css*/
            .jssorb051 .i {position:absolute;cursor:pointer;}
            .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
            .jssorb051 .i:hover .b {fill-opacity:.7;}
            .jssorb051 .iav .b {fill-opacity: 1;}
            .jssorb051 .i.idn {opacity:.3;}

            /*jssor slider arrow skin 051 css*/
            .jssora051 {display:block;position:absolute;cursor:pointer;}
            .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
            .jssora051:hover {opacity:.8;}
            .jssora051.jssora051dn {opacity:.5;}
            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        </style>
    </head>
    <body>
        <div class="itemFixed cartFixed">
            <a href="<?php echo site_url("gio-hang.html"); ?>"><i class="fa fa-shopping-basket icon-cart" aria-hidden="true"></i> 
                <span class="numberCart"><?php echo $cart_tt_item;?></span>
            </a>
        </div>
        <div class="itemFixed backTop" style="display: none">
            <a href="javascript:void(0)"><img src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>totop.png" alt="Back to top"></a>
        </div>
        <div class="nav-header">
            <div class="container">
                <div class="row">
                    <div class="headerlogo col-lg-3 col-md-2 col-sm-12 col-xs-12">
                        <a href="<?php echo site_url('', $langcode); ?>"><img width="170px" class="logo" title="<?php echo $common_lang['title']; ?>" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>logo2.png" /></a>

                        <div class="mbToggle">
                            <a href="javascript:void(0)" class="btnMBToggleNav"><img src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>iconmenu.png" alt="Multi chanel"></a>
                        </div>
                        <div class="mbCart">
                            <a href="<?php echo site_url("gio-hang.html"); ?>">
                                <div class="icon">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                </div>
                                <span id="cartCountMB" class="numberCart"><?php echo $cart_tt_item;?></span>
                            </a>
                        </div>
                    </div>
                    <div class="headersearch col-md-5 col-sm-12 col-xs-12">
                        <div class="frmSearch relative">
                            <input required="" class="form-input" autocomplete="off" type="text" name="q" onkeyup="loadsearch()" id="inputSearchAuto" placeholder="Nhập từ khóa cần tìm...">
                            <img class="searchload" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>image_search.gif" alt="loading" />
                            <button type="submit" class="insButton btnSearch">
                                <span class="text">Tìm kiếm</span>
                                <span class="icon"><i class="fa fa-search"></i></span>
                            </button>

                            <div id="ajaxSearchResults" class="ajaxSearchAuto">
                            </div>
                        </div>
                    </div>
                    <div id="headerCart" class="headercart col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="cleafix">
                            <div class="itemInfo cartBox relative marright10">
                                <a href="<?php echo site_url("gio-hang.html"); ?>">
                                    <i class="icon icon-cart"></i>
                                    <div class="text wrap-cart">
                                        <h6 class="text-cart title">Giỏ hàng</h6>
                                        <span class="cart-total sub colory"><span id="cartCount" class="numberCart" data-count="3"><?php echo $cart_tt_item;?></span> sản phẩm</span>          
                                    </div>
                                </a>
                            </div>

                            <div class="itemInfo userBox relative">
                                <?php if ($isLogin) { ?>
                                <a href="javascript:void(0)" class="user-info">
                                    <?php if($this->session->userdata('avatar')){ ?>
                                    <img class="icon icon-user2" src="<?php echo $this->session->userdata('avatar') ?>" />
                                    <?php }else{?>
                                    <i class="icon icon-user"></i>
                                    <?php }?>
                                    <div class="text wrap-user">
                                        <h6 class="text-user title">
                                            Tài Khoản
                                        </h6>
                                        <span class="user-total sub colory">
                                            <?php echo $fullname; ?>  
                                        </span>          
                                    </div>
                                </a>
                                <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">
                                    <i class="icon icon-user"></i>
                                    <div class="text wrap-user">
                                        <h6 class="text-user title">
                                            Tài Khoản   
                                        </h6>
                                        <span class="user-total sub colory">
                                            Đăng nhập
                                        </span>          
                                    </div>
                                </a>
                                <?php } ?>  
                                <?php if ($isLogin) { ?>
                                <div class="user-box-info popover">
                                    <a href="<?php echo site_url("thong-tin-tai-khoan.html") ?>"><p class="user-info-item"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin tài khoản</p></a>
                                    <a href="<?php echo site_url("don-hang-cua-toi.html") ?>"><p class="user-info-item"><i class="fa fa-history" aria-hidden="true"></i> Đơn hàng của tôi</p></a>
                                    <a href="<?php echo site_url("dang-xuat.html") ?>"><p class="user-info-item line"><i class="fa fa-sign-out" aria-hidden="true"></i> Thoát</p></a>
                                </div> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="overlayMenu"></div>
                </div>
            </div>    
        </div>
        <div class="mb-nav-header">
            <nav id="navWrap" class="nav navSiteMain">
                <div class="userinfo cleafix">
                    <div class="mb-icon-user pull-left">
                        <?php if($this->session->userdata('avatar')){ ?>
                        <img width="50" class="logo" title="Khách hàng" src="<?php echo $this->session->userdata('avatar') ?>" />
                        <?php }else{?>
                        <img width="50" class="logo" title="Khách hàng" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>usermenu.png" />
                        <?php }?>
                        
                    </div>
                    <div class="mb-icon-text pull-left">
                        <?php if ($isLogin) { ?>
                        <p class="uview"><a style="color: #fff" href="javascript:void(0)" title ><?php echo $fullname ?> <i style="transition: all .5s;" class="fa fa-angle-double-down" aria-hidden="true"></i></a></p>
                        <?php } else { ?>
                            <p class="log"  data-toggle="modal" data-target="#loginModal">Đăng nhập ngay</p>
                        <?php } ?>
                    </div>
                </div>
                <div id="uinfo" style="display: none">
                    <p class="menu-items">
                        <a style="color: #be60c5;" href="<?php echo site_url("thong-tin-tai-khoan.html") ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin tài khoản
                        </a>
                    </p>
                    <p class="menu-items">
                        <a style="color: #be60c5;" href="<?php echo site_url("don-hang-cua-toi.html") ?>">
                            <i class="fa fa-history" aria-hidden="true"></i> Đơn hàng của tôi
                        </a>
                    </p>
                    <p class="menu-items">
                        <a style="color: #be60c5;" href="<?php echo site_url("dang-xuat.html") ?>">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất
                        </a>
                    </p>
                </div>
                <p class="menu-item">
                    <a href="#">
                        Trang chủ
                    </a>
                </p>
                <p class="menu-item">
                    <a href="<?php echo site_url("lan-moi-dang.html") ?>">
                        Lan mới đăng
                    </a>
                </p>
                <p class="menu-item">
                    <a href="<?php echo site_url("lan-dang-sale.html") ?>">
                        Lan đang sale
                    </a>
                </p>
                <p class="menu-item">
                    <a href="<?php echo site_url("gioi-thieu.html") ?>">
                        Giới thiệu
                    </a>
                </p>
                <p class="menu-item">
                    <a href="<?php echo site_url("lien-he.html") ?>">
                        Liên hệ
                    </a>
                </p>
                <div style="margin-top: 20px;text-align: center;">
                    <span id="close-menu" class="btn-close">Đóng lại</span>
                </div>
                
            </nav>
        </div>
        <div class="nav-menu">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cleafix">
                        <div class="title-menu-left pull-left">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            Danh mục sản phẩm
                        </div>
                        <ul class="box-menu pull-left">
                            <li class=""><a href="#">Trang chủ</a></li>
                            <li class=""><a href="<?php echo site_url("lan-moi-dang.html") ?>">Lan mới đăng</a></li>
                            <li class=""><a href="<?php echo site_url("lan-dang-sale.html") ?>">Lan đang sale</a></li>
                            <li class=""><a href="<?php echo site_url("gioi-thieu.html") ?>">Giới thiệu</a></li>
                            <li class=""><a href="<?php echo site_url("lien-he.html") ?>">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
        <div style="background-color: #f5f9ea">
            <div class="mb-nav-menu container">
                <div class="mb-nav-menu2 relative">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    Danh mục sản phẩm

                    <i class="mb-nav-menu-icon fa fa-chevron-down" aria-hidden="true"></i>
                </div>
            </div>
            <div class="mb-nav-menu-content container">
                <div class="mb-nav-menu-content2 ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cleafix">
                            <?php foreach ($listcat as $item) { ?>
                                <p class="menu-item">
                                    <a href="<?php echo site_url(create_slug($item['cat_name']) . '-c' . $item['cat_id'] . ".html") ?>">
                                        <i class="fa fa-pagelines" aria-hidden="true"></i>
                                        <?php echo $item['cat_name'] ?>
                                    </a>
                                </p>
                            <?php } ?>

                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="nav-slide">
            <div class="container ">
                <div class="row">
                    <div class="sc-slide col-lg-12 col-md-12 col-sm-12 col-xs-12 cleafix">
                        <div class="box-slide-left pull-left">
                            <div class="box-menu-left " id="my-scroll">
                                <?php foreach ($listcat as $item) { ?>
                                    <p class="menu-item">.
                                        <a href="<?php echo site_url(create_slug($item['cat_name']) . '-c' . $item['cat_id'] . ".html") ?>">
                                            <i class="fa fa-pagelines" aria-hidden="true"></i>
                                            <?php echo $item['cat_name']; ?>
                                        </a>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="box-slide-right pull-right">
                            <div class="slide">
                                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:889px;height:420px;overflow:hidden;visibility:hidden;">
                                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:889px;height:420px;overflow:hidden;">
                                        <div>
                                            <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img1.jpg" />
                                        </div>
                                        <div>
                                            <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img2.jpg" />
                                        </div>
                                        <div>
                                            <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img3.jpeg" />
                                        </div>
                                        <div>
                                            <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img4.jpg" />
                                        </div>
                                    </div>
                                    <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                            <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Arrow Navigator -->
                                    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                                        </svg>
                                    </div>
                                    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">jssor_1_slider_init();</script>
                        </div>
                    </div>

                    <div class="mbslide col-lg-12 col-md-12 col-sm-12 col-xs-12 cleafix">
                        <div class="slide">
                            <div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:750px;height:350px;overflow:hidden;visibility:hidden;">
                                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:750px;height:350px;overflow:hidden;">
                                    <div>
                                        <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img1.jpg" />
                                    </div>
                                    <div>
                                        <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img2.jpg" />
                                    </div>
                                    <div>
                                        <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img3.jpeg" />
                                    </div>
                                    <div>
                                        <img data-u="image" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>slide/img4.jpg" />
                                    </div>
                                </div>
                                <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                                    <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>    
                        <script type="text/javascript">jssor_2_slider_init();</script>
                    </div>
                </div>
            </div>   
        </div>
        <script>
            $(function () {
                $(".mb-nav-menu").on("click", function () {
                    if ($(".mb-nav-menu-content").is(':hidden'))
                    {
                        $(".mb-nav-menu-content").slideDown();
                        $(".mb-nav-menu i").addClass("rotated");
                    } else
                    {
                        $(".mb-nav-menu-content").slideUp();
                        $(".mb-nav-menu i").removeClass("rotated");
                    }
                });

                $(".btnMBToggleNav").on("click", function () {
                    $(".mb-nav-header").addClass("mb-nav-header-show");
                    $(".overlayMenu").show();

                });
                $("#close-menu").on("click", function () {
                    $(".mb-nav-header").removeClass("mb-nav-header-show");
                    $(".overlayMenu").hide();
                });

                $(window).scroll(function () {
                    showcart();
                });

                $(".backTop").on("click", function () {
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $(this).removeClass("trans");
                });


            });
        </script>   



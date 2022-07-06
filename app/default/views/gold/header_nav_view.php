<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <base href="<?php echo base_url(); ?>" />
        <title><?php echo $title == "" ? $common_lang["title"] : $title?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
        <link type="image/x-icon" href="<?php echo base_url();?>logo.ico" rel="icon" />
        <link type="image/x-icon" href="<?php echo base_url();?>logo.ico" rel="shortcut icon" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="og:title" property="og:title" content="<?php echo $metaTitle == "" ? $common_lang["metatitle"] : $metaTitle?>">
        <meta name="keywords" content="<?php echo $metaKeyword == "" ? $common_lang['keyword'] : $metaKeyword;?>" />
        <meta name="description" content="<?php echo $metaDesc == "" ? $common_lang["description"] : $metaDesc?>" />
        <meta name="robots" content="index,follow,noodp" /><meta name="robots" content="noarchive">
        <meta name="language" content="vietnamese" />
        
        <meta property="og:url"           content="<?php echo curPageURL() ?>" />
        <meta property="og:type"          content="<?php echo $title == "" ? $common_lang["title"] : $title?>" />
        <meta property="og:title"         content="<?php echo $title == "" ? $common_lang["title"] : $title?>" />
        <meta property="og:description"   content="<?php echo $metaDesc == "" ? $common_lang["description"] : $metaDesc?>" />
        <meta property="og:image"         content="<?php echo $img == "" ? "" : $img?>" />
        
        <!-- bootstrap -->
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jquery-1.11.1.min.js"></script>
        
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>common.css" rel='stylesheet' type='text/css' media="all" />
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>style.css" rel='stylesheet' type='text/css' media="all" />
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>xzoom.css" rel='stylesheet' type='text/css' media="all" />
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>magnific-popup.css" rel='stylesheet' type='text/css' media="all" />
        <!--start-smoth-scrolling-->
        <link href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>phone.css" rel='stylesheet' type='text/css' media="all" />

        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>font-awesome4.7/css/font-awesome.min.css" />
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>bootstrap.min.js"></script>  
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>common.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>xzoom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>magnific-popup.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>jquery.twbsPagination.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="itemFixed cartFixed">
            <a href="<?php echo site_url("gio-hang.html"); ?>"><i class="fa fa-shopping-basket icon-cart" aria-hidden="true"></i> 
                <span class="numberCart "><?php echo $cart_tt_item;?></span>
            </a>
        </div>
        <div class="itemFixed backTop" style="display: none">
            <a href="javascript:void(0)"><img src="images/<?php echo ltrim(URI_PATH .'/', '/');?>totop.png" alt="Back to top"></a>
        </div>
        <div class="nav-header">
            <div class="container">
                <div class="row">
                    <div class="headerlogo col-lg-3 col-md-2 col-sm-12 col-xs-12">
                        <a href="<?php echo site_url('', $langcode); ?>"><img width="170px" class="logo" title="<?php echo $common_lang['title']; ?>" src="images/<?php echo ltrim(URI_PATH .'/', '/');?>logo2.png" /></a>
                    
                        <div class="mbToggle">
							<a href="javascript:void(0)" class="btnMBToggleNav"><img src="images/<?php echo ltrim(URI_PATH .'/', '/');?>iconmenu.png" alt="Multi chanel"></a>
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
                                             Tài khoản
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
                <?php if ($isLogin) { ?>
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
                <?php } ?>
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
                    <span id="close-menu" class="btn-close"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng lại</span>
                </div>

            </nav>
        </div>
        <div class="nav-menu">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cleafix">
                        <div class="title-menu-left pull-left cursor-pointer relative">
                            <i class="mb-nav-menu-icon2 fa fa-chevron-down" aria-hidden="true"></i>
                            Danh mục sản phẩm
                            
                            <div class="nav-box-menu">
                                <?php foreach ($listcat as $item){ ?>
                                <p class="menu-item">
                                    <a href="<?php echo site_url(create_slug( $item['cat_name']).'-c'.$item['cat_id'].".html") ?>">
                                        <i class="fa fa-pagelines" aria-hidden="true"></i>
                                        <?php echo $item["cat_name"]?>
                                    </a>
                                </p>
                                <?php } ?>
                                
                            </div>    
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
                        <?php foreach ($listcat as $item){ ?>
                        <p class="menu-item">
                            <a href="<?php echo site_url(create_slug( $item['cat_name']).'-c'.$item['cat_id'].".html") ?>">
                                <i class="fa fa-pagelines" aria-hidden="true"></i>
                                <?php echo $item["cat_name"]?>
                            </a>
                        </p>
                        <?php } ?>
                    </div>
                </div> 
            </div>
        </div>
        </div>
        <script>
            $(function(){
                $(".mb-nav-menu").on("click", function(){
                    if($(".mb-nav-menu-content").is(':hidden'))
                    {
                        $(".mb-nav-menu-content").slideDown();
                        $(".mb-nav-menu i").addClass("rotated");
                    }
                    else
                    {
                        $(".mb-nav-menu-content").slideUp();
                        $(".mb-nav-menu i").removeClass("rotated");
                    }
                }); 
                
                $(".title-menu-left").on("click", function(){
                    if($(".nav-box-menu").is(':hidden'))
                    {
                        $(".nav-box-menu").slideDown();
                        $(".title-menu-left i.mb-nav-menu-icon2").addClass("rotated");
                    }
                    else
                    {
                        $(".nav-box-menu").slideUp();
                        $(".title-menu-left i.mb-nav-menu-icon2").removeClass("rotated");
                    }
                }); 
                
                
                
                $(".btnMBToggleNav").on("click", function(){
                    $(".mb-nav-header").addClass("mb-nav-header-show");
                    $(".overlayMenu").show();
                    
                }); 
                $("#close-menu").on("click", function(){
                    $(".mb-nav-header").removeClass("mb-nav-header-show");
                    $(".overlayMenu").hide();
                }); 
                
                $(window).scroll(function() {
                    showcart();
                });
                
                $(".backTop").on("click", function(){
                    $('html, body').animate({scrollTop:0}, 'slow');
                    $(this).removeClass("trans");
                });
                
            });
        </script>    

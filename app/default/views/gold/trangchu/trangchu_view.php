<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
    <div class="wrapperContent">
        <div class="headingContent">
            <a href="/collections/spa-massage-du-lich">
                <h2>
                    <i class="fa fa-pagelines" aria-hidden="true"></i>
                    <span>
                        Hoa Mới Về
                    </span>
                </h2>
            </a>
            
        </div>
        <div class="contentProduct">
            <div class="pdListHome row">
                <?php foreach ($list_Pro_New as $item)
                { 
                    $arrimg = explode(",", $item['list_filename']);
                    $this->load->model('category/Category_model');
                    $catinfo = $this->Category_model->st_category_get_info($item['cat_id']);
                ?>
                <div class="itemProduct col-md-3 col-sm-4 col-xs-6">
                    <div class="pdLoopItem animated zoomIn">
                        <div class="itemLoop clearfix">
                            <div class="pdLoopImg elementFixHeight">
                                <?php if($item["price_sale"] > 0){ ?>
                                <div class="pdLabel sale">
                                    <span>- <?php echo getpecent($item["price_sale"], $item["price"]) ?>%</span>
                                </div>
                                <?php } ?>
                                
                                <a href="<?php echo site_url(create_slug($catinfo['cat_name']).'/'.create_slug($item['pro_name']).'-c'.$catinfo['cat_id'].'a'.$item['pro_id'].'.html')?>" title="<?php echo $item['pro_name'] ?>">
                                    <img src="<?php echo $arrimg[0] ?>" data-reg="true" class="imgLoopItem" alt="<?php echo $item['pro_name'] ?>" style="width: auto;">

                                </a>
                                <div class="pdLoopAction">
                                    <div class="listAction">
                                        <a href="javascript:void(0)" class="add-cart btnLoop Addcart" data-pid="<?php echo $item['pro_id'] ?>" title="Thêm vào giỏ"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Thêm vào giỏ</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pdLoopDetail text-center clearfix">
                                <h3 class="pdLoopName"><a class="productName" href="<?php echo site_url(create_slug($catinfo['cat_name']).'/'.create_slug($item['pro_name']).'-c'.$catinfo['cat_id'].'a'.$item['pro_id'].'.html')?>" title="<?php echo $item['pro_name'] ?>"><?php echo $item['pro_name'] ?> </a></h3>
                                <p class="pdPrice">

                                    <span><?php echo number_format($item["price"])?>₫</span>
                                    <?php if($item["price_sale"] > 0){ ?>
                                    <del class="pdComparePrice"><?php echo number_format($item["price_sale"])?>₫</del>
                                    <?php } ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                
            </div>
            <div class="blockViewAll">
                <a href="<?php echo site_url("lan-moi-dang.html") ?>" class="insButton viewAll">Xem tất cả</a>
            </div>
        </div>
        
        
        <div class="headingContent">
            <a href="/collections/spa-massage-du-lich">
                <h2>
                    <i class="fa fa-pagelines" aria-hidden="true"></i>
                    <span>
                        Hoa đang sale
                    </span>
                </h2>
            </a>
            
        </div>
        <div class="contentProduct">
            <div class="pdListHome row">
                <?php foreach ($list_Pro_Sale as $item)
                { 
                    $arrimg = explode(",", $item['list_filename']);
                     $this->load->model('category/Category_model');
                    $catinfo = $this->Category_model->st_category_get_info($item['cat_id']);
                ?>
                <div class="itemProduct col-md-3 col-sm-4 col-xs-6">
                    <div class="pdLoopItem animated zoomIn">
                        <div class="itemLoop clearfix">
                            <div class="pdLoopImg elementFixHeight">
                                <?php if($item["price_sale"] > 0){ ?>
                                <div class="pdLabel sale">
                                    <span>- <?php echo getpecent($item["price_sale"], $item["price"]) ?>%</span>
                                </div>
                                <?php } ?>
                                <a href="<?php echo site_url(create_slug($catinfo['cat_name']).'/'.create_slug($item['pro_name']).'-c'.$catinfo['cat_id'].'a'.$item['pro_id'].'.html')?>" title="<?php echo $item['pro_name'] ?>">
                                    <img src="<?php echo $arrimg[0] ?>" data-reg="true" class="imgLoopItem" alt="<?php echo $item['pro_name'] ?>" style="width: auto;">

                                </a>
                                <div class="pdLoopAction">
                                    <div class="listAction">
                                        <a href="javascript:void(0)" class="add-cart btnLoop Addcart" data-pid="<?php echo $item['pro_id'] ?>" title="Thêm vào giỏ"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Thêm vào giỏ</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pdLoopDetail text-center clearfix">
                                <h3 class="pdLoopName"><a class="productName" href="<?php echo site_url(create_slug($catinfo['cat_name']).'/'.create_slug($item['pro_name']).'-c'.$catinfo['cat_id'].'a'.$item['pro_id'].'.html')?>" title="<?php echo $item['pro_name'] ?>"><?php echo $item['pro_name'] ?></a></h3>
                                <p class="pdPrice">

                                    <span><?php echo number_format($item["price"])?>₫</span>
                                    <?php if($item["price_sale"] > 0){ ?>
                                    <del class="pdComparePrice"><?php echo number_format($item["price_sale"])?>₫</del>
                                    <?php } ?>

                                </p>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
             <div class="blockViewAll">
                <a href="<?php echo site_url("lan-dang-sale.html") ?>" class="insButton viewAll">Xem tất cả</a>
            </div>
        </div>
    </div>
</div>

<script>
    
    function setHeightPro()
    {
        var windowWidth = $( window ).innerWidth();
        if(windowWidth < 750)
        {
            var itemWidth = $(".itemLoop  .elementFixHeight").width();
            $(".itemLoop  .elementFixHeight").css("cssText", "height: "+itemWidth+"px !important;");
        }
        else
        {
            $(".itemLoop  .elementFixHeight").removeAttr("style");
        }
    }
    $( window ).resize(function() {
        setHeightPro();
    });
    
    $(function(){
        setHeightPro();
        
        $(".add-cart").click(function(){
            var pid = $(this).data("pid");
            var cart = $('.itemFixed .icon-cart');
            var imgtodrag = $(this).parent().parent().prev().find("img").eq(0);;
            if (imgtodrag) {
                $(".cartFixed").addClass("loading");
                var imgclone = imgtodrag.clone().offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                }).css({
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
                }).appendTo($('body')).animate({
                    'top': cart.offset().top,
                    'left': cart.offset().left,
                    'width': 20,
                    'height': 20
                }, 1000);
                
                imgclone.animate({'width': 0,'height': 0}, function () {
                    $(this).detach();
                    $(".cartFixed").removeClass("loading");
                });
            }
            ajax_cart_add("<?php echo site_url("gio-hang/them.html") ?>", pid, 1);
        });
    });
</script>

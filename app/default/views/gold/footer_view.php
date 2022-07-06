<!-- footer -->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="footer-static-title">
                        <h3>Thông tin hỗ trợ</h3>
                    </div>
                    <div class="footer-static-content">
                        <p class="footer-location-info"><a href=""> <i class="fa fa-pagelines" aria-hidden="true"></i> Trang chủ</a></p>
                        <p class="footer-location-info"><a href="<?php echo site_url("gioi-thieu.html") ?>"> <i class="fa fa-pagelines" aria-hidden="true"></i> Giới thiệu HOA LAN HÀ NỘI</a></p>
                        <p class="footer-location-info"><a href="<?php echo site_url("dieu-khoan-dich-vu.html") ?>"> <i class="fa fa-pagelines" aria-hidden="true"></i> Điều khoản dịch vụ</a></p>
                        <p class="footer-location-info"><a href="<?php echo site_url("lien-he.html") ?>"> <i class="fa fa-pagelines" aria-hidden="true"></i> Liên hệ HOA LAN HÀ NỘI</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="footer-static-title">
                        <h3>Thông tin liên hệ</h3>
                    </div>
                    <div class="footer-static-content">
                        <p class="footer-location-content"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $setup['address']?></p>
                        <p class="footer-location-info"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $setup['phone']?></p>
                        <p class="footer-location-info"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $setup['email']?></p>

                        <a class="facebook" href="<?php echo $setup['link_page_facebook']?>" target="_blank" title="Hoa lan hanoi">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="end-footer">Copyright © 2018 | Bản quyền thuộc về Hoa Lan Hà Nội</p>
                </div>
            </div>
        </div>
    </div>     
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-circle-o" aria-hidden="true"></i> ĐĂNG NHẬP</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger login-mess" role="alert" style="display: none">
                    This is a danger alert—check it out!
                </div>
                <div id="loginPopupFrm" class="boxLogin">
                    <div class="customerGroup">
                        <span class="iconFrm"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                        <input required="" type="email" id="txt-login-email" autocomplete="off" name="txt-login-email" placeholder="Email của bạn" value="" class="form-control">
                    </div>
                    <div class="customerGroup">
                        <span class="iconFrm"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input required="" type="password" id="txt-login-password" autocomplete="off" name="txt-login-password" placeholder="Nhập mật khẩu" value="" class="form-control">
                    </div>
                    <div class="customerGroup action">
                        <a href="javascript:void(0)" class="forgetPass">Quên mật khẩu?</a>
                        <button type="button" class="btn btn-my btn-login">Đăng nhập ngay</button>
                        <p class="reg" style="margin-top: 5px;font-size: 14px">
                            Bạn chưa có tài khoản? <a href="<?php echo site_url("dang-ky-tai-khoan.html") ?>">Đăng ký ngay.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="bg-loading">
    <img width="120px" src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>icon-loading.gif" alt="loading" />
</div>

<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="left: -40px; bottom: 160px; position: fixed;z-index: 10;">
    <div class="phonering-alo-ph-circle"></div>
    <div class="phonering-alo-ph-circle-fill"></div>
    <a href="tel:0966 041 990"></a>
    <div class="phonering-alo-ph-img-circle">
        <a href="tel:0966 041 990"></a>
        <a href="tel:0966 041 990" class="pps-btn-img " title="Liên hệ">
            <img src="images/transparent.gif" alt="Liên hệ" width="50" onmouseover="this.src = 'images/transparent.gif';" onmouseout="this.src = 'images/transparent.gif';">
        </a>
    </div>
</div>
<!--<a href="tel:+84123456789">
    <span style="left: 90px; bottom: 30px; position: fixed; background-color: rgba(51, 51, 51, 0.75); color: yellow; padding: 5px 10px; border-radius: 5px; font-size: 20px; z-index: 10000;"><strong>123456798</strong></span>
</a>-->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="<?php echo $setup['id_page_facebook']?>"
  theme_color="#0084ff"
  logged_in_greeting="Xin chào! Bạn cần giúp gì ?"
  logged_out_greeting="Xin chào! Bạn cần giúp gì ?">
</div>

<script src="<?php echo base_url(); ?>js/<?php echo ltrim(URI_PATH . '/', '/') . $template_f; ?>setup_action.js" type="text/javascript"></script>
<script>
    $(function () {
    auto_height_menuleft();
    $(".btnSearch").click(function () {
    var kw = $("#inputSearchAuto").val().trim();
    if (kw.length > 0)
    {
    window.location = "<?php echo site_url("ket-qua-tim-kiem.html?result=") ?>" + kw;
    }
    });
    });
    $(window).resize(function () {
    showloading();
    auto_height_menuleft();
    });
    function auto_height_menuleft()
    {
    var height = $("#jssor_1").height();
    $(".box-menu-left").css("height", height + "px");
    }

</script>    
</body>
</html>
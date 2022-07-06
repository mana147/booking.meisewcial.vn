<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard/dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//san phẩm
$route['san-pham/chi-tiet'] = 'sanpham/sanpham/chitiet';
//$route['san-pham'] = 'sanpham/sanpham/danhmuc';
$route['lan-moi-dang.html'] = 'sanpham/sanpham/hoamoive';
$route['lan-moi-dang/([a-z]+)/([0-9]+).html'] = 'sanpham/sanpham/hoamoive/$1/$2';
$route['lan-moi-dang/([a-z]+)/([0-9]+)/([0-9]+)([0-9]+)([0-9]+).html'] = 'sanpham/sanpham/hoamoive/$1/$2/$3/$4/$5';

$route['lan-dang-sale.html'] = 'sanpham/sanpham/landangsale';
$route['lan-dang-sale/([a-z]+)/([0-9]+).html'] = 'sanpham/sanpham/landangsale/$1/$2';
$route['lan-dang-sale/([a-z]+)/([0-9]+)/([0-9]+)([0-9]+).html'] = 'sanpham/sanpham/landangsale/$1/$2/$3/$4';
$route['([a-zA-Z0-9-_]+)-c([0-9]+).html'] = 'sanpham/sanpham/danhmuc/$1/$2';
$route['([a-zA-Z0-9-_]+)-c([0-9]+)/([a-z]+)/([0-9]+).html'] = 'sanpham/sanpham/danhmuc/$1/$2/$3/$4';
$route['([a-zA-Z0-9-_]+)-c([0-9]+)/([a-z]+)/([0-9]+)/([0-9]+)([0-9]+)([0-9]+).html'] = 'sanpham/sanpham/danhmuc/$1/$2/$3/$4/$5/$6/$7';

//chi tiet san pham
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)-c([0-9]+)a([0-9]+).html'] = 'sanpham/sanpham/chitiet/$1/$2/$3/$4';
$route['tim-kiem.html'] = 'sanpham/sanpham/timkiem';
$route['ket-qua-tim-kiem.html'] = 'sanpham/sanpham/kqtimkiem';
$route['ket-qua-tim-kiem/([a-z]+)/([0-9]+).html'] = 'sanpham/sanpham/kqtimkiem/$1/$2';

//tài khoản
$route['dang-ky-tai-khoan.html'] = 'taikhoan/taikhoan/dangky';
$route['dang-ky/check-email'] = 'taikhoan/taikhoan/checkemail';
$route['dang-ky/them-moi'] = 'taikhoan/taikhoan/newUser';
$route['dang-ky/kich-hoat'] = 'taikhoan/taikhoan/active';
$route['dang-nhap'] = 'taikhoan/taikhoan/login';
$route['dang-xuat.html'] = 'taikhoan/taikhoan/logout';
$route['thong-tin-tai-khoan.html'] = 'taikhoan/taikhoan/info';
$route['loadarea2'] = 'taikhoan/taikhoan/load_area2';
$route['xoa-dia-chi'] = 'taikhoan/taikhoan/removeAdd';
$route['address-set-default'] = 'taikhoan/taikhoan/setdefault';
$route['don-hang-cua-toi.html'] = 'taikhoan/taikhoan/info_order';
$route['removeOrder'] = 'taikhoan/taikhoan/removeOrder';
$route['mail'] = 'cart/cart/mail';

$route['fbcallback'] = 'taikhoan/taikhoan/fbcallback';
$route['ggcallback'] = 'taikhoan/taikhoan/ggcallback';

//giohang
$route['gio-hang/them.html'] = 'cart/cart/add';
$route['gio-hang.html'] = 'cart/cart/index';
$route['giohang/sua.html'] = 'cart/cart/update';
$route['dat-hang.html'] = 'cart/cart/payment';
$route['process'] = 'cart/cart/process';

//lien hệ
$route['lien-he.html'] = 'dashboard/dashboard/contact';
$route['gioi-thieu.html'] = 'dashboard/dashboard/introduction';



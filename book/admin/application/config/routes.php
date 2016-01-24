<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['404_override'] = ''; // ok
$route['default_controller'] = "manage/index/index"; // ok
$route['index'] = "manage/index/index"; 
$route['dang-nhap'] = "manage/authentic/login"; // ok
$route['dang-xuat'] = "manage/authentic/logout"; // ok
$route['doi-mat-khau'] = "manage/user/changepw"; //ok
$route['cap-nhat-thong-tin'] = "manage/user/profile"; // ok

/**
 * 
 * @void categories 
 * 
 */
$route['danh-muc-san-pham'] = "manage/categoriesproduct/index"; // ok
$route['danh-muc-san-pham/trang-(:num)']  = "manage/categoriesproduct/index"; // ok
$route['danh-muc-san-pham/them-danh-muc'] = "manage/categoriesproduct/addcategories"; // ok
$route['danh-muc-san-pham/sua-danh-muc/(:num)'] = "manage/categoriesproduct/editcategories"; // ok
$route['danh-muc-san-pham/xoa-danh-muc/(:num)'] = "manage/categoriesproduct/deletecategories"; // ok

/**
 * 
 * @void product
 * 
 */
$route['danh-sach-san-pham'] = "manage/product/index"; // ok
$route['danh-sach-san-pham/trang-(:num)']  = "manage/product/index"; // ok
$route['danh-sach-san-pham/them-san-pham'] = "manage/product/addproduct"; // ok
$route['danh-sach-san-pham/sua-san-pham/(:num)'] = "manage/product/editproduct"; // ok
$route['danh-sach-san-pham/xoa-san-pham/(:num)'] = "manage/product/deleteproduct";  // ok

/**
 * 
 * @void article
 * 
 */
$route['danh-sach-bai-viet'] = "manage/article/index"; ////
$route['danh-sach-bai-viet/trang-(:num)']  = "manage/article/index";
$route['danh-sach-bai-viet/them-bai-viet'] = "manage/article/addarticle";
$route['danh-sach-bai-viet/sua-bai-viet/(:num)'] = "manage/article/editarticle";
$route['danh-sach-bai-viet/xoa-bai-viet/(:num)'] = "manage/article/deletearticle";

/**
 * 
 * @void feedback
 * 
 */
$route['danh-sach-phan-hoi'] = "manage/feedback/index";
$route['danh-sach-phan-hoi/trang-(:num)'] = "manage/feedback/index";
$route['danh-sach-phan-hoi/sua-phan-hoi/(:num)'] = "manage/feedback/editfeedback";
$route['danh-sach-phan-hoi/xoa-phan-hoi/(:num)'] = "manage/feedback/deletefeedback";

/**
 * 
 * @void order
 * 
 */
$route['danh-sach-dat-hang'] = "manage/order/index";
$route['danh-sach-dat-hang/trang-(:num)'] = "manage/order/index";
$route['danh-sach-dat-hang/sua-don-hang/(:num)'] = "manage/order/editorder";
$route['danh-sach-dat-hang/xoa-don-hang/(:num)'] = "manage/order/deleteorder";
$route['danh-sach-dat-hang/xoa-chi-tiet-don-hang/(:num)'] = "manage/order/deleteorderdetail";

/**
 * 
 * @void nguoi-dung
 * 
 */
$route['nguoi-dung'] = "manage/user/index";
$route['nguoi-dung/trang-(:num)'] = "manage/user/index";
$route['nguoi-dung/sua-nguoi-dung/(:num)'] = "manage/user/edit";
$route['nguoi-dung/xoa-nguoi-dung/(:num)'] = "manage/user/delete";
$route['nguoi-dung/them-nguoi-dung'] = "manage/user/add";
/**
 * 
 * @void tac-gia
 * 
 */
$route['tac-gia'] = "manage/author/index";
$route['tac-gia/trang-(:num)'] = "manage/author/index";
$route['tac-gia/them-tac-gia'] = "manage/author/add";
$route['tac-gia/sua-tac-gia/(:num)'] = "manage/author/edit";
$route['tac-gia/xoa-tac-gia/(:num)'] = "manage/author/delete";

/**
 * 
 * @void nha-xuat-ban
 * 
 */
$route['nha-xuat-ban'] = "manage/nxb/index";
$route['nha-xuat-ban/trang-(:num)'] = "manage/nxb/index";
$route['nha-xuat-ban/them-nha-xuat-ban'] = "manage/nxb/add";
$route['nha-xuat-ban/sua-nha-xuat-ban/(:num)'] = "manage/nxb/edit";
$route['nha-xuat-ban/xoa-nha-xuat-ban/(:num)'] = "manage/nxb/delete";

$route['thong-ke'] = "manage/index/report";

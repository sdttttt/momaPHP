<?php
/*
  +----------------------------------------------------------------------
 | ThinkPHP [ WE CAN DO IT JUST THINK ]
 +----------------------------------------------------------------------
 | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
 +----------------------------------------------------------------------
 | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 +----------------------------------------------------------------------
 | Author: liu21st <liu21st@gmail.com>
 +----------------------------------------------------------------------
*/

use think\Route;

// +----------------------------------------------------------------------
// | Primary Route
// +----------------------------------------------------------------------

#Banner
Route::get('api/:version/banner/:id','api/:version.BannerController/getAllBanner');

#Theme
Route::get('api/:version/theme/:id','api/:version.ThemeController/getHomeAll');

#Token
Route::post('api/:version/login','api/:version.TokenController/login');
Route::post('api/:version/verify','api/:version.TokenController/verify');

#userINFO
Route::post('api/:version/user/wallet','api/:version.UserController/getWallet');

#Category
Route::get('api/:version/category/all','api/:version.CategoryController/getProductAll');

#Product
Route::get('api/:version/product/:id','api/:version.ProductController/getOneProduct');

#Order
Route::post('api/:version/order/make','api/:version.OrderController/make');

// +----------------------------------------------------------------------
// | Super User Power
// +----------------------------------------------------------------------

#Select
Route::get("api/admin/product/all",'api/admin.ProductController/getAllImpl');
Route::get('api/admin/category/all','api/admin.CategoryController/getAllImpl');
Route::get('api/admin/banner/all','api/admin.BannerController/getAllImpl');
Route::get('api/admin/banneritem/all','api/admin.BannerItemController/getAllImpl');
Route::get('api/admin/theme/all','api/admin.ThemeController/getAllImpl');
Route::get('api/admin/themeitem/all','api/admin.ThemeItemController/getAllImpl');
Route::get('api/admin/user/all','api/admin.UserController/getAllImpl');

#Update
Route::post('api/admin/banner/upgrade','api/admin.BannerController/updateImpl');
Route::post('api/admin/banneritem/upgrade','api/admin.BannerItemController/updateImpl');
Route::post('api/admin/category/upgrade','api/admin.CategoryController/updateImpl');
Route::post('api/admin/product/upgrade','api/admin.ProductController/updateImpl');
Route::post('api/admin/theme/upgrade','api/admin.ThemeController/updateImpl');
Route::post('api/admin/themeitem/upgrade','api/admin.ThemeItemController/updateImpl');
Route::post('api/admin/user/upgrade','api/admin.UserController/updateImpl');

#Delete
Route::delete('api/admin/banner/:bannerID','api/admin.BannerController/deleteimpl');
Route::delete('api/admin/banneritem/:banneritemID','api/admin.BannerItemController/deleteimpl');
Route::delete('api/admin/category/:categoryID','api/admin.CategoryController/deleteimpl');
Route::delete('api/admin/product/:productID','api/admin.ProductController/deleteimpl');
Route::delete('api/admin/theme/:themeID','api/admin.ThemeController/deleteimpl');
Route::delete('api/admin/themeitem/:themeitemID','api/admin.ThemeItemController/deleteimpl');

// +----------------------------------------------------------------------
// | Unit Test
// +----------------------------------------------------------------------

#test
Route::get('test/one','api/TestController/testS');
Route::get('test/tow','api/SonController/fuck');

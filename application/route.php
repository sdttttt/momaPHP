<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

#Banner
Route::get('api/:version/banner/:id','api/:version.BannerController/getAllBanner');

#Theme
Route::get('api/:version/theme/:id','api/:version.ThemeController/getHomeAll');

#Token
Route::get('api/:version/login/:code','api/:version.TokenController/login');
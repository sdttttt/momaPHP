<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @return mixed
 */

function curl_get($url, &$httpCode = 0,$header = [])
{
    if(empty($url))
        return false;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (isset($header))
        curl_setopt($ch, CURLOPT_HEADER, $header);
    //设置header
    //不做证书校验,部署在linux环境下请改为true
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, false);    //表示不需要response header
    curl_setopt($ch, CURLOPT_NOBODY, FALSE); //表示需要response body
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}

/**
 * @param string $url
 * @param string $param
 * @param string $header
 * @return bool|string
 */
function curl_post($url = '' , $param,&$code , array $header) {
    if (empty($url) || empty($param))
        return false;

    $head = array_merge($header,[
        'Content-Type: application/json',
        'Content-Length: ' . strlen($param)]);

    $ch = curl_init();//初始化curl
    curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, true);//post提交方式//表示不需要response header
    curl_setopt($ch, CURLOPT_NOBODY, FALSE); //表示需要response body
    //设置参数
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    //设置请求头
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);

    $data = curl_exec($ch);//运行curl
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $data;
}


function getRandChar($length)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i = 0;
         $i < $length;
         $i++) {
        $str .= $strPol[rand(0, $max)];
    }

    return $str;
}

function dd($var)
{
    dump($var);
    die();
}
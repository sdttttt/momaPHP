<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/2/10
 * Time: 21:47
 */

return [
    'wx_login' => 'https://api.weixin.qq.com/sns/jscode2session?'.
        'appid=%s&secret=%s&js_code=%s&grant_type=authorization_code',
    'get_token_url' => 'https://api.weixin.qq.com/cgi-bin/token?' .
        'grant_type=client_credential&appid=%s&secret=%s',
    'app_id' => 'wxedcd71ddcc04678b',
    'app_secret' => 'de6a35eaa96cbae7f3cf28b67418045e',
    'rand_key' => 'zhousdtttttcun7758258haoFUCK',
    'token_live_time' => 7200
];
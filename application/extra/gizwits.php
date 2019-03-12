<?php
/**
 * Created by PhpStorm.
 * User: sdttttt
 * Date: 2019/3/12
 * Time: 15:28
 */

return [
    'login_url' => 'http://api.gizwits.com/app/users',
    'bind_url' => 'http://api.gizwits.com/app/bindings',
    'control_url' => 'http://api.gizwits.com/app/control/%s',
    'appid' => '26bddf4bb50e41d7984f9c9c7e1e4da1',
    'did' => 'NyeRpSKyWztKJm2fTrWPvP',
    'passcode' => '123456',
    'headers' => [
       'id' => 'X-Gizwits-Application-Id:%s',
        'token' => 'X-Gizwits-User-token:%s'
    ]
];
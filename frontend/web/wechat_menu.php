<?php
require(__DIR__ . '/../../vendor/autoload.php');
use EasyWeChat\Foundation\Application;
$config = [
    // 基础信息配置
    'app_id'  => 'wxee965f36dcfa3eaa',         // AppID
    'secret'  => '04f09a81fa4c08ebd27c7352eacfc16d',     // AppSecret
    'token'   => '0129wechat',          // Token
    'aes_key' => '',                    // EncodingAESKey
    //
    'oauth' => [
        'scopes'   => ['snsapi_userinfo'],
        'callback' => '/frontend/web/wechat_callback.php',
    ],
];

$app = new Application($config);
$menu = $app->menu;
$menus = [
    [
        "type" => "view",
        "name" => "微信物业管理",
        "url"  => "http://xiaoqu.okiter.com/frontend/web/wechat_red.php",
    ],
];
$menu->add($menus);
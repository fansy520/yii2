<?php
/**
 * 接收微信授权之后跳转回来的页面
 *
 * 微信网页授权总结:
 * 1. 跳转到微信指定的授权页面,(需要传入回调URL地址)
 * 2. 在回调URL地址中获取微信传过来的code参数.
 * 3. 通过code参数获取access_token
 * 4. 通过access_token换取用户信息
 * 5. 通过用户信息对比本地数据库
 *
 * 回调地址: http://xiaoqu.okiter.com/wechat_callback.php
 *
https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf0e81c3bee622d60&redirect_uri=http%3A%2F%2Fnba.bluewebgame.com%2Foauth_response.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect
 */
$appid = 'wxee965f36dcfa3eaa';
$secret = '04f09a81fa4c08ebd27c7352eacfc16d';
//$requestUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.urlencode('http://xiaoqu.okiter.com/wechat_callback.php').'&response_type=code&scope=snsapi_userinfo&state=0129hello#wechat_redirect';
//echo $requestUrl;
//exit;


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
$oauth = $app->oauth;

// 获取 OAuth 授权结果用户信息
$user = $oauth->user();
$openid = $user->getId();// 获取OPENID
$nickname = $user->getNickname(); // 获取昵称
$headImg = $user->getAvatar();
session_start();
$_SESSION['userInfo'] = $user->toArray();
header('location: http://xiaoqu.okiter.com/frontend/web/index.php');

//$code = $_GET['code']; // 微信生成并返回给我们的 有了code才能换取access_token
//$state = $_GET['state'];
//if($state != '0129hello'){
//    exit('');
//}
//if(!$code){
//    exit('没有授权');
//}
////2. 拿到code之后,要请求微信换取 access_token
///**
// * appid
// * secret
// * code
//https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code
// */
//$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
//
//Wechat::getUrl($url);
//
//
//
//class Wechat{
//    public static function getUrl($url){
////        $ch = curl_init();
////        curl_setopt($ch, CURLOPT_URL, $url);
////        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////        curl_setopt($ch, CURLOPT_HEADER, 0);
////
////        $res = curl_exec($ch);
////        curl_close($ch);
////        var_dump($res);
//
//        $res = file_get_contents($url);
//        $res = json_decode($res, true);
//        if(isset($res['errcode'])){
//            // 出错了
//            exit('微信请求ACCESS_TOKEN出错');
//        }
//        // 获取ACCESS_TOKEN
//        $access_token = $res['access_token'];
////        session_start(); // 开启SESSION
////        $_SESSION['access_token'] = $access_token; // 存储数据
////        $_SESSION['refresh_token'] = $res['refresh_token']; // 存储数据
////        $_SESSION['open_id'] = $res['openid'];
//        /**
//         * 3.通过获取的ACCESS_TOKEN 换取用户信息
//        https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN
//         */
//        $getUserInfoUrl = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$res['openid'].'&lang=zh_CN';
//        $userInfoJson = file_get_contents($getUserInfoUrl);
//        $userInfo = json_decode($userInfoJson, true);
//        // 通过$userInfo['unionid']在数据库中查找,如果有就直接登录成功,没有就需要在数据库中添加数据
//        echo "<pre/>";
//        var_dump($userInfo);
//    }
//}

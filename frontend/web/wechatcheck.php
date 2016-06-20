<?php
/**
 * 接收并验证微信传过来的验证数据
 */
// 签名字符串 sha1()签名过后的字符串;
$sign = $_GET["signature"];
// 请求时间戳
$timestamp = $_GET['timestamp'];
// 随机数
$nonce = $_GET['nonce'];
// 随机字符串,如果验证成功则应该输出这个字符串
$echostr = $_GET['echostr'];
// token和微信填写的应该一致
$token = '0129wechat';

$arr = [$token, $timestamp, $nonce];
sort($arr,SORT_STRING);
$str = implode($arr);
$str = sha1($str);
if($str == $sign){
    // 验证成功!;
    exit($echostr);
}
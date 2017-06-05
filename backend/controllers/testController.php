<?php
function encode($string = '', $skey = 'cxphp') {
//先用base64进行加密，然后把得到的字符串分解成数组
$strArr = str_split(base64_encode($string));
//计算数组的长度
$strCount = count($strArr);
//循环自定义的钥匙,拆分钥匙然后追加到以前的数组，得到新数组
foreach (str_split($skey) as $key => $value){
$strArr[$key].=$value;
}
//替换 = + / ，然后输入
return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

/**
* 简单对称加密算法之解密
* @param String $string 需要解密的字串
* @param String $skey 解密KEY
* @return String
*/
function decode($string = '', $skey = 'cxphp') {
$strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
$strCount = count($strArr);
foreach (str_split($skey) as $key => $value)
$key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
return base64_decode(join('', $strArr));
};

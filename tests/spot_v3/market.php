<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/Mxc-php.git
 * */
use Lin\Mxc\MxcSpotV3;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$mexc=new MxcSpotV3();

//You can set special needs
$mexc->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

]);
/*
try {
    $result=$mexc->publics()->getTime();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//try {
//    $result=$mexc->publics()->getExchangeInfo();
//    print_r($result);
//}catch (\Exception $e){
//    print_r($e->getMessage());
//}

try {
    $result=$mexc->publics()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>10
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$mexc->publics()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>10
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
*/
try {
    $result=$mexc->publics()->getKline([
        'symbol'=>'BTCUSDT',
        'interval'=>'60m'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}


<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/Mxc-php.git
 * */
use Lin\Mxc\MxcContract;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$mexc=new MxcContract();

//You can set special needs
$mexc->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //If you are developing locally and need an agent, you can set this
    //'proxy'=>true,
    //More flexible Settings
    /* 'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ], */
    //Close the certificate
    //'verify'=>false,
]);

try {
    $result=$mexc->market()->getPing();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getDetail();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getSupportCurrencies();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getDepth([
        'symbol'=>'BTC_USDT',
        'limit'=>2
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getDepthCommits([
        'symbol'=>'BTC_USDT',
        'limit'=>2
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


try {
    $result=$mexc->market()->getIndexPrice([
        'symbol'=>'BTC_USDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getFairPrice([
        'symbol'=>'BTC_USDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getFundingRate([
        'symbol'=>'BTC_USDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getKline([
        'symbol'=>'BTC_USDT',
        'interval'=>'Min60',
        'start'=>'1616168957',
        'end'=>'1616468957',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}



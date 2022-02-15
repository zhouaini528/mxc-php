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

$mexc=new MxcContract($key,$secret);

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
    $result=$mexc->planorder()->getOrders([
        'page_num'=>1,
        'page_size'=>10,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->planorder()->postPlace([
        'symbol'=>'BTC_USDT',
        'price'=>'5000',
        'vol'=>'1',
        'side'=>'1',
        'openType'=>'2',
        'triggerPrice'=>'5500',
        'triggerType'=>'2',
        'executeCycle'=>'1',
        'orderType'=>'1',
        'trend'=>'1',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->planorder()->postCancel([
        'symbol'=>'BTC_USDT',
        'orderId'=>'xxxxxxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}





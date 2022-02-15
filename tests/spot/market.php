<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/Mxc-php.git
 * */
use Lin\Mxc\MxcSpot;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$mexc=new MxcSpot($key,$secret);

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
    $result=$mexc->market()->getDeals([
        'symbol'=>'btc_usdt',
        'limit'=>2,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mexc->market()->getDepth([
        'depth'=>2,
        'symbol'=>'btc_usdt'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->market()->getTicker([
        'symbol'=>'btc_usdt',
        'limit'=>2
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mexc->market()->getKline([
        'symbol'=>'btc_usdt',
        'interval'=>'1h',
        //'limit'=>10
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mexc->market()->getSymbols();
    print_r($result['data'][0]);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}





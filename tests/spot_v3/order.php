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

$mexc=new MxcSpotV3($key,$secret);

//You can set special needs
$mexc->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

//Place an Order
try {
    $result=$mexc->privates()->postOrder([
        'symbol'=>'EOSUSDT',
        'side'=>'SELL',
        'type'=>'LIMIT',
        'price'=>'10',
        'quantity'=>1,
        //'newClientOrderId'=>'xxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Get order details by order ID.
try {
    $result=$mexc->privates()->getOrder([
        'symbol'=>'EOSUSDT',
        'orderId'=>$result['orderId'],
        //'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Cancelling an unfilled order.
try {
    $result=$mexc->privates()->deleteOrder([
        'symbol'=>'EOSUSDT',
        'orderId'=>$result['orderId'],
        //'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
 



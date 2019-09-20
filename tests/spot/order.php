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

$Mxc=new MxcSpot($key,$secret);

//You can set special needs
$Mxc->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //If you are developing locally and need an agent, you can set this
    'proxy'=>true,
    //More flexible Settings
    /* 'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ], */
    //Close the certificate
    'verify'=>false,
]);

//Place an Order
try {
    $result=$Mxc->order()->post([
        /* api_key	string	√	您的api key
        market	string	√	交易对
        price	string	√	交易价格
        quantity	string	√	交易数量
        req_time	string	√	请求时间戳
        trade_type	integer	√	交易类型：1/2 (买/卖)
        sign	string	√	请求签名 */
        
        'market'=>'EOS_USDT',
        'price'=>'0.1',
        'trade_type'=>'1',
        'quantity'=>1,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Get order details by order ID.
try {
    $result=$Mxc->order()->get([
        'instrument_id'=>'btc-usdt',
        'order_id'=>$result['order_id'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1);

//Cancelling an unfilled order.
try {
    $result=$Mxc->order()->postCancel([
        'instrument_id'=>'btc-usdt',
        'order_id'=>$result['order_id'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}




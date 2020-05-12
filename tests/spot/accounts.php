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

$mxc=new MxcSpot($key,$secret);
//$mxc=new MxcSpot('mmmyyyaaapppiiikkkeeeyyy','ssseeecccrrreeettt');
/*
GET
/api/v2/order/open_orders
api_key=mxcV9JCC8iu8zpaiWC&limit=1000&req_time=1572936251&startTime=1572076703000&symbol=MX_ETH&tradeType=BID
*/
//GET https://www.mxc.co/api/v2/order/open_orders?api_key=mxcV9JCC8iu8zpaiWC&limit=1000&req_time=1572936251&startTime=1572076703000&symbol=MX_ETH&tradeType=BID&sign=0d1a5ee9e76a4907abedc4fe383ddfd0

//You can set special needs
$mxc->setOptions([
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

//Place an Order
try {
    $result=$mxc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}





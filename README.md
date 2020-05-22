### It is recommended that you read the official document first


Mxc spot docs [https://mxcdevelop.github.io/APIDoc/](https://mxcdevelop.github.io/APIDoc/)

All interface methods are initialized the same as those provided by Mxc. See details [src/api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api)


Most of the interface is now complete, and the user can continue to extend it based on my design, working with me to improve it.

[中文文档](https://github.com/zhouaini528/mxc-php/blob/master/README_CN.md)

### Other exchanges API

[Exchanges](https://github.com/zhouaini528/exchanges-php) It includes all of the following exchanges and is highly recommended.

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/Mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/bitfinex-php)

#### Installation
```
composer require linwj/mxc-php
```

Support for more request Settings
```php
$mxc=new MxcSpot($key,$secret);
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
```

### Mxc Spot API

Order Book [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/market.php)

```php
$mxc=new MxcSpot($key,$secret);
try {
    $result=$mxc->market()->getDeals([
        'symbol'=>'btc_usdt',
        'limit'=>2,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mxc->market()->getDepth([
        'depth'=>2,
        'symbol'=>'btc_usdt'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mxc->market()->getTicker([
        'symbol'=>'btc_usdt',
        'limit'=>2
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mxc->market()->getKline([
        'symbol'=>'btc_usdt',
        'interval'=>'1h',
        //'limit'=>10
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 

try {
    $result=$mxc->market()->getSymbols();
    print_r($result['data'][0]);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Order related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/order.php)

```php
//Place an Order
try {
    $result=$mxc->order()->postPlace([
        'symbol'=>'EOS_USDT',
        'price'=>'6',
        'quantity'=>1,
        'trade_type'=>'ASK',//BID=buy，ASK=sell
        'order_type'=>'LIMIT_ORDER',//LIMIT_ORDER，POST_ONLY，IMMEDIATE_OR_CANCEL
        //'client_order_id'=>''
        
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
} 
sleep(1);

//Get order details by order ID.
try {
    $result=$mxc->order()->getQuery([
        'symbol'=>'EOS_USDT',
        'order_ids'=>$result['data'],
        //'client_order_ids'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
sleep(1); 

//Cancelling an unfilled order.
try {
    $result=$mxc->order()->deleteCancel([
        'symbol'=>'EOS_USDT',
        'order_ids'=>$result['data'][0]['id'],
        //'client_order_ids'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

Accounts related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/accounts.php)

```php
try {
    $result=$mxc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

```

[More Test](https://github.com/zhouaini528/mxc-php/tree/master/tests/spot)

[More Api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Spot)
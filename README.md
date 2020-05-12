### It is recommended that you read the official document first

Mxc spot docs [https://mxcdevelop.github.io/APIDoc/](https://mxcdevelop.github.io/APIDoc/)

All interface methods are initialized the same as those provided by okex. See details [src/api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api)

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

#### 安装方式
```
composer require linwj/mxc-php
```

支持更多的请求设置 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/proxy.php#L21)
```php
$okex=new OkexSpot();
//You can set special needs
$okex->setOptions([
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

### Mxc 现货交易 API

Order Book [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/Mxc/market.php)

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

Order related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/Mxc/order.php)

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

Accounts related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/Mxc/accounts.php)

```php
try {
    $result=$mxc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

```

[More Test](https://github.com/zhouaini528/mxc-php/tree/master/tests/Mxc)

[More Api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Mxc)
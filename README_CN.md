### 建议您先阅读官方文档

Mxc 文档地址 [https://mxcdevelop.github.io/APIDoc/](https://mxcdevelop.github.io/APIDoc/)

所有接口方法的初始化都与Mxc提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/mxc-php/blob/master/README_CN.md)

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php)

[Okex](https://github.com/zhouaini528/okex-php)

[Huobi](https://github.com/zhouaini528/huobi-php)

[Binance](https://github.com/zhouaini528/binance-php)

[Kucoin](https://github.com/zhouaini528/Kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

#### 安装方式
```
composer require linwj/mxc-php
```

支持更多的请求设置
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

### Mxc 现货交易 API

行情数据 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/market.php)

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

下单、撤单、查询订单 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/order.php)

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

账户查询 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/accounts.php)

```php
try {
    $result=$mxc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

```

[更多用例请查看](https://github.com/zhouaini528/mxc-php/tree/master/tests/spot)

[更多API请查看](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Spot)
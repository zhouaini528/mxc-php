### 建议您先阅读官方文档

Mexc 文档地址 [https://mxcdevelop.github.io/APIDoc/](https://mxcdevelop.github.io/APIDoc/)

所有接口方法的初始化都与Mxc提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/mxc-php/blob/master/README_CN.md)

QQ交流群：668421169

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php) 支持[Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README_CN.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) 支持[Websocket](https://github.com/zhouaini528/okex-php/blob/master/README_CN.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) 支持[Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) 支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mexc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)   

[Bigone](https://github.com/zhouaini528/bigone-php)   

[Crex24](https://github.com/zhouaini528/crex24-php)   

[Bybit](https://github.com/zhouaini528/bybit-php)  

[Coinbene](https://github.com/zhouaini528/coinbene-php)   

[Bitget](https://github.com/zhouaini528/bitget-php)   

[Poloniex](https://github.com/zhouaini528/poloniex-php)

#### 安装方式
```
composer require linwj/mxc
```

支持更多的请求设置
```php
$mexc=new MxcSpot();
//or
$mexc=new MxcSpot($key,$secret);

//You can set special needs
$mexc->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    //https://github.com/guzzle/guzzle
    'proxy'=>[],
    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],
    
    //Set Demo Trading
    'headers'=>['x-simulated-trading'=>1]
]);
```

### Mxc 现货交易 API，[支持现货V3接口](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot_v3)

行情数据 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/market.php)

```php
$mexc=new MxcSpot($key,$secret);
try {
    $result=$mexc->market()->getDeals([
        'symbol'=>'btc_usdt',
        'limit'=>2,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
} 

try {
    $result=$mexc->market()->getDepth([
        'depth'=>2,
        'symbol'=>'btc_usdt'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$mexc->market()->getTicker([
        'symbol'=>'btc_usdt',
        'limit'=>2
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
} 

try {
    $result=$mexc->market()->getKline([
        'symbol'=>'btc_usdt',
        'interval'=>'1h',
        //'limit'=>10
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
} 

try {
    $result=$mexc->market()->getSymbols();
    print_r($result['data'][0]);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

下单、撤单、查询订单 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/order.php)

```php
//Place an Order
try {
    $result=$mexc->order()->postPlace([
        'symbol'=>'EOS_USDT',
        'price'=>'6',
        'quantity'=>1,
        'trade_type'=>'ASK',//BID=buy，ASK=sell
        'order_type'=>'LIMIT_ORDER',//LIMIT_ORDER，POST_ONLY，IMMEDIATE_OR_CANCEL
        //'client_order_id'=>''
        
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
} 
sleep(1);

//Get order details by order ID.
try {
    $result=$mexc->order()->getQuery([
        'symbol'=>'EOS_USDT',
        'order_ids'=>$result['data'],
        //'client_order_ids'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
sleep(1); 

//Cancelling an unfilled order.
try {
    $result=$mexc->order()->deleteCancel([
        'symbol'=>'EOS_USDT',
        'order_ids'=>$result['data'][0]['id'],
        //'client_order_ids'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

账户查询 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/accounts.php)

```php
try {
    $result=$mexc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[更多用例请查看](https://github.com/zhouaini528/mxc-php/tree/master/tests/spot)

[更多API请查看](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Spot)


### Mxc 期货交易 API

行情数据 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/market.php)

```php
$mexc=new MxcContract();

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
```

下单、撤单、查询订单 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/order.php)

```php
$mexc=new MxcContract($key,$secret);

//order
try {
    $result=$mexc->order()->postSubmit([
        'symbol'=>'BTC_USDT',
        'price'=>'5000',
        'vol'=>'1',
        'side'=>'1',
        'type'=>'1',
        'openType'=>'2',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->order()->postCancel([
        'symbol'=>'BTC_USDT',
        'orderId'=>'xxxxxxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->order()->postCancelAll([
        'symbol'=>'BTC_USDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//PlanOrder
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

//StopOrder
try {
    $result=$mexc->stoporder()->getOrders([
        'page_num'=>1,
        'page_size'=>10,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->stoporder()->postCancel([
        'symbol'=>'BTC_USDT',
        'orderId'=>'xxxxxxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->stoporder()->postChangePrice([
        'orderId'=>'xxxxxxxx',
        'stopLossPrice'=>'5000',
        'takeProfitPrice'=>'0',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

账户、仓位 [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/postion.php)
```php
$mexc=new MxcContract($key,$secret);

try {
    $result=$mexc->position()->getHistoryPositions([
        //'symbol'=>'BTC_USDT',
        //'type'=>1,
        'page_num'=>1,
        'page_size'=>10,
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$mexc->account()->getAssets();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

[更多用例请查看](https://github.com/zhouaini528/mxc-php/tree/master/tests/contract)

[更多API请查看](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Contract)



### It is recommended that you read the official document first

Mexc docs [https://mxcdevelop.github.io/APIDoc/](https://mxcdevelop.github.io/APIDoc/)

All interface methods are initialized the same as those provided by Mxc. See details [src/api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api)


Most of the interface is now complete, and the user can continue to extend it based on my design, working with me to improve it.

[中文文档](https://github.com/zhouaini528/mxc-php/blob/master/README_CN.md)

### Other exchanges API

[Exchanges](https://github.com/zhouaini528/exchanges-php) It includes all of the following exchanges and is highly recommended.

[Bitmex](https://github.com/zhouaini528/bitmex-php) Support [Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) Support [Websocket](https://github.com/zhouaini528/okex-php/blob/master/README.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) Support [Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) Support [Websocket](https://github.com/zhouaini528/binance-php/blob/master/README.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mexc](https://github.com/zhouaini528/Mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/bitfinex-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)   

[Bigone](https://github.com/zhouaini528/bigone-php)   

[Crex24](https://github.com/zhouaini528/crex24-php)   

[Bybit](https://github.com/zhouaini528/bybit-php)  

[Coinbene](https://github.com/zhouaini528/coinbene-php)   

[Bitget](https://github.com/zhouaini528/bitget-php)   

[Poloniex](https://github.com/zhouaini528/poloniex-php)

#### Installation
```
composer require linwj/mxc
```

Support for more request Settings
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

### Mxc Spot API,[Support Spot V3](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot_v3)

Order Book [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/market.php)

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

Order related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/order.php)

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

Accounts related API [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/spot/accounts.php)

```php
try {
    $result=$mexc->account()->getInfo();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[More Test](https://github.com/zhouaini528/mxc-php/tree/master/tests/spot)

[More Api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Spot)

### Mxc Contract API

Market [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/market.php)

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

Order [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/order.php)

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

Account and Position  [More](https://github.com/zhouaini528/mxc-php/blob/master/tests/contract/postion.php)
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

[More Test](https://github.com/zhouaini528/mxc-php/tree/master/tests/contract)

[More Api](https://github.com/zhouaini528/mxc-php/tree/master/src/Api/Contract)



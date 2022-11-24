### 建议您先阅读官方文档
币币交易文档地址 [https://github.com/binance-exchange/binance-official-api-docs](https://github.com/binance-exchange/binance-official-api-docs)

USDT合约交易文档地址 [https://binance-docs.github.io/apidocs/futures/cn](https://binance-docs.github.io/apidocs/futures/cn)

币本位合约文档地址 [https://binance-docs.github.io/apidocs/delivery/cn](https://binance-docs.github.io/apidocs/delivery/cn)

支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/binance-php/blob/master/README.md)

QQ交流群：668421169

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php) 支持[Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README_CN.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) 支持[Websocket](https://github.com/zhouaini528/okex-php/blob/master/README_CN.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) 支持[Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) 支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

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

**如果没有找到你想要的交易所SDK你可以告诉我，我来加入它们。** 

#### 安装方式
```
composer require linwj/binance
```

本地开发支持代理 [More](https://github.com/zhouaini528/binance-php/blob/master/tests/proxy.php#L21)

```php
use Rdtvaacar\Binance\Binance;
$binance=new Binance($key,$secret);

//You can set special needs
$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //https://github.com/guzzle/guzzle
    'proxy'=>[],
    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],
    //default is v1
    'version'=>'v2',
]);
```


### 币币交易 API

系统数据相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/system.php)


```php
use Rdtvaacar\Binance\Binance;
$binance=new Binance();

//Order book
try {
    $result=$binance->system()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Recent trades list
try {
    $result=$binance->system()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Current average price
try {
    $result=$binance->system()->getAvgPrice([
        'symbol'=>'BTCUSDT'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


交易相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/trade.php)

```php
use Rdtvaacar\Binance\Binance;
$binance=new Binance($key,$secret);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'quantity'=>'0.01',
        'price'=>'2000',
        'timeInForce'=>'GTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['origClientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['origClientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


用户相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/spot/user.php)

```php
use Rdtvaacar\Binance\Binance;
$binance=new Binance($key,$secret);

//Get all account orders; active, canceled, or filled.
try {
    $result=$binance->user()->getAllOrders([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
        //'orderId'=>'',
        //'startTime'=>'',
        //'endTime'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Get current account information.
try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```


[更多用例](https://github.com/zhouaini528/binance-php/tree/master/tests/spot)

[更多API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

### 合约交易 API

Market数据相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/market.php)

```php
use Rdtvaacar\Binance\BinanceFuture;
use Rdtvaacar\Binance\BinanceDelivery;

$binance=new BinanceFuture();
$binance=new BinanceDelivery();
try {
    $result=$binance->market()->getExchangeInfo();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getDepth([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getHistoricalTrades([
        'symbol'=>'BTCUSDT'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getAggTrades([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getPremiumIndex([
        //'symbol'=>'BTCUSDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->market()->getFundingRate([
        'symbol'=>'BTCUSDT',
        'limit'=>5
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

交易相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/trade.php)

```php
use Rdtvaacar\Binance\BinanceFuture;
use Rdtvaacar\Binance\BinanceDelivery;

$binance=new BinanceFuture($key,$secret);
//Or New Delivery
$binance=new BinanceDelivery($key,$secret);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'BTCUSDT',
        'side'=>'BUY',
        'type'=>'LIMIT',
        'quantity'=>'1',
        'price'=>'5000',
        'timeInForce'=>'GTC',
        //'newClientOrderId'=>'xxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
sleep(1);

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        //'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
sleep(1);

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

用户相关 API [More](https://github.com/zhouaini528/binance-php/blob/master/tests/future/user.php)

```php
use Rdtvaacar\Binance\BinanceFuture;
use Rdtvaacar\Binance\BinanceDelivery;

$binance=new BinanceFuture($key,$secret);
//Or New Delivery
$binance=new BinanceDelivery($key,$secret);

try {
    $result=$binance->user()->getBalance();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getAccount();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>'111111111',
        'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getOpenOrder([
        'symbol'=>'BTCUSDT',
        'orderId'=>'111111111',
        'origClientOrderId'=>'xxxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getLeverageBracket();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getForceOrders();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$binance->user()->getAdlQuantile();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[更多用例](https://github.com/zhouaini528/binance-php/tree/master/tests/future)

[更多API](https://github.com/zhouaini528/binance-php/tree/master/src/Api)

### Websocket

Websocket有两个服务server和client，server负责处理交易所新连接、数据接收、认证登陆等等。client负责获取数据、处理数据。

Server端初始化，必须在Linux CLI模式下开启。[Websocket行情应用举例](https://github.com/zhouaini528/websocket-market)
```php
use \Rdtvaacar\Binance\BinanceWebSocket;
require __DIR__ .'./vendor/autoload.php';

$binance=new BinanceWebSocket();

$binance->config([
    //是否开启日志,默认未开启 false
    'log'=>true,
    //或者设置日志名称，默认按照日期保存
    //'log'=>['filename'=>'spot'],

    //进程服务端口地址,默认 0.0.0.0:2208
    //'global'=>'127.0.0.1:2208',

    //心跳时间,默认 20 秒
    //'ping_time'=>20,

    //订阅新的频道监控时间, 默认 2 秒
    //'listen_time'=>2,

    //频道数据更新时间,默认 0.1 秒
    //'data_time'=>0.1,

    //私有数据队列默认保存100条
    //'queue_count'=>100,

    //baseurl
    'baseurl'=>'ws://stream.binance.com:9443',//默认现货
    //'baseurl'=>'ws://fstream.binance.com',//usdt期货
    //'baseurl'=>'ws://dstream.binance.com',//币本位期货
]);

$binance->start();
```

如果你要测试，你可以 php server.php start 可以在终端即时输出日志。

如果你要部署，你可以 php server.php start -d  开启常驻进程模式，并开启'log'=>true 查看日志。

[更多用例请查看](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/server_spot.php)


Client端初始化。
```php
$binance=new BinanceWebSocket();

$binance->config([
    //是否开启日志,默认未开启 false
    'log'=>true,

    //进程服务端口地址,默认 0.0.0.0:2208
    //'global'=>'127.0.0.1:2208',

    //心跳时间,默认 20 秒
    //'ping_time'=>20,

    //订阅新的频道监控时间, 默认 2 秒
    //'listen_time'=>2,

    //频道数据更新时间,默认 0.1 秒
    //'data_time'=>0.1,

    //私有数据队列默认保存100条
    //'queue_count'=>100,

    'baseurl'=>'ws://stream.binance.com:9443',//默认现货
    //'baseurl'=>'ws://fstream.binance.com',//usdt期货
    //'baseurl'=>'ws://dstream.binance.com',//币本位期货
]);
```

频道订阅
```php
//你可以只订阅公共频道
$binance->subscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);

//你也可以私人频道与公共频道混合订阅，设置了keysecret默认会订阅私人所有频道
$binance->keysecret([
    'key'=>'xxxxxxxxx',
    'secret'=>'xxxxxxxxx',
]);
$binance->subscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20',
]);
```

频道订阅取消
```php
//取消订阅公共频道
$binance->unsubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);

//取消私人频道与公共频道混合订阅，设置了keysecret默认会取消订阅私人所有频道
$binance->keysecret([
    'key'=>'xxxxxxxxx',
    'secret'=>'xxxxxxxxx',
]);
$binance->unsubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
    'btcusdt@aggTrade',
    'btcusdt@trade',
    'btcusdt@kline_1d',
    'btcusdt@miniTicker',
    'btcusdt@depth20'
]);
```

获取全部频道订阅数据
```php
//第一种方式，直接获取当前最新数据
$data=$binance->getSubscribes();
print_r(json_encode($data));


//第二种方式，通过回调函数，获取当前最新数据
$binance->getSubscribes(function($data){
    print_r(json_encode($data));
});

//第二种方式，通过回调函数并开启常驻进程，获取当前最新数据
$binance->getSubscribes(function($data){
    print_r(json_encode($data));
},true);

//注意如果需要循环获取数据，第一种和第二种方法需要加上'pcntl_alarm(0)'
while(1){
    pcntl_alarm(0);
    sleep(1);
    $data=$binance->getSubscribes();
    print_r(json_encode($data));
}
```

获取部分频道订阅数据
```php
//The first way
$data=$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
]);
print_r(json_encode($data));

//The second way callback
$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
});

//The third way is to guard the process
$binance->getSubscribe([
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
},true);
```

获取私有频道订阅数据，私有频道默认全部返回
```php
//The first way
$binance->keysecret($key_secret);
$data=$binance->getSubscribe();//返回私有频道所有数据
print_r(json_encode($data));

//The second way callback
$binance->keysecret($key_secret);
$binance->getSubscribe([//返回私有频道所有数据、返回部分公共频道数据
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
});

//The third way is to guard the process
$binance->keysecret($key_secret);
$binance->getSubscribe([//返回私有频道所有数据、返回部分公共频道数据
    'btcusdt@depth',
    'bchusdt@depth',
],function($data){
    print_r(json_encode($data));
},true);
```

重新链接websocket公共行情数据、私有数据
```php
$binance->reconPublic();//重新链接全部共行情

$binance->reconPrivate($key);//重新订阅私有数据
```

[现货更多用例请查看](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_spot.php)

[USDT期货更多用例请查看](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_usdt_future.php)

[币本位期货更多用例请查看](https://github.com/zhouaini528/binance-php/tree/master/tests/websocket/client_coin_future.php)

**如果你觉得对你有帮助，谢谢你的打赏**

![zhifubao](https://user-images.githubusercontent.com/5442664/122150914-303fcf00-ce91-11eb-91bd-7f7a24c9ab03.jpg)

![weixin](https://user-images.githubusercontent.com/5442664/122150967-4a79ad00-ce91-11eb-866f-4e5f6c859269.jpg)



<?php


/**
 * @author lin <465382251@qq.com>
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/huobi-php.git
 * */
use Acr\Binance\BinanceFuture;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new BinanceFuture($key,$secret);

$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //https://github.com/guzzle/guzzle
    'proxy'=>[],

    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],

    //default is v1
    //'version'=>'v2',
]);

try {
    $result=$binance->user()->getAllOrders([
        'symbol'=>'BTCUSDT',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

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










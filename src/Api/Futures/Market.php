<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Binance\Api\Futures;

use Lin\Binance\Request;

class Market extends Request
{
    //该接口默认不需要HMAC SHA256
    protected $signature=false;
    
    /**
     * GET /fapi/v1/exchangeInfo
     * */
    public function getExchangeInfo(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/depth';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/trades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/historicalTrades
     * */
    public function getHistoricalTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/aggTrades
     * */
    public function getAggTrades(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/aggTrades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/klines
     * */
    public function getKlines(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/klines';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/premiumIndex
     * */
    public function getPremiumIndex(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/premiumIndex';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/fundingRate
     * */
    public function getFundingRate(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/fundingRate';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/ticker/24hr 
     * */
    public function get24hr(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/ticker/price
     * */
    public function getPrice(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/price';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /fapi/v1/ticker/bookTicker
     * */
    public function getBookTicker(array $data=[]){
        $this->type='GET';
        $this->path='/fapi/v1/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }
}
<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\SpotV3;

use Lin\Mxc\Request;

class Publics extends Request
{
    /*
     *GET /api/v3/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/ping';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/time
     * */
    public function getTime(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/time';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/exchangeInfo
     * */
    public function getExchangeInfo(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/exchangeInfo';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/depth';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/trades';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/historicalTrades
     * */
    public function getHistoricalTrades(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/historicalTrades';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/aggTrades
     * */
    public function getAggTrades(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/aggTrades';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/kline
     * */
    public function getKline(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/kline';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/avgPrice
     * */
    public function getAvgPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/avgPrice';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/ticker/24hr
     * */
    public function getTicker24hr(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/ticker/24hr';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/ticker/price
     * */
    public function getTickerPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/ticker/price';
        $this->data=$data;
        return $this->exec();
    }

    /*
     *GET /api/v3/ticker/bookTicker
     * */
    public function getTickerBookTicker(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/ticker/bookTicker';
        $this->data=$data;
        return $this->exec();
    }
}
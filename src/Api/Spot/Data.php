<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Data extends Request
{
    /**
     * GET /open/api/v1/data/markets 获取市场列表信息
     * */
    public function getMarkets(){
        $this->type='GET';
        $this->path='/open/api/v1/data/markets';
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/data/markets_info 获取交易对信息
     * */
    public function getMarketsInfo(){
        $this->type='GET';
        $this->path='/open/api/v1/data/markets_info';
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/data/depth 获取深度信息
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/data/depth';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/data/history 获取单个币种成交记录信息
     * */
    public function getHistory(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/data/history';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/data/ticker 获取市场行情信息
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/data/ticker';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/data/kline 获取市场k线信息
     * */
    public function getKline(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/data/kline';
        $this->data=$data;
        return $this->exec();
    }
}
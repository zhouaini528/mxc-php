<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Market extends Request
{
    /**
     * GET /open/api/v2/market/ticker
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/market/ticker';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/market/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/market/depth';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/market/deals
     * */
    public function getDeals(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/market/deals';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/market/kline
     * */
    public function getKline(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/market/kline';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/market/symbols
     * */
    public function getSymbols(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/market/symbols';
        $this->data=$data;
        return $this->exec();
    }
}
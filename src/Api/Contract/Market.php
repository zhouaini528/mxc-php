<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class Market extends Request
{
    protected $authentication=false;

    /**
     *GET api/v1/contract/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/ping';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/detail
     * */
    public function getDetail(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/detail';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/support_currencies
     * */
    public function getSupportCurrencies(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/support_currencies';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/depth/{symbol}
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/depth/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/depth_commits/{symbol}/{limit}
     * */
    public function getDepthCommits(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/depth_commits/'.$data['symbol'].'/'.$data['limit'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/index_price/{symbol}
     * */
    public function getIndexPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/index_price/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/fair_price/{symbol}
     * */
    public function getFairPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/fair_price/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/funding_rate/{symbol}
     * */
    public function getFundingRate(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/funding_rate/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/kline/{symbol}
     * */
    public function getKline(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/kline/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/kline/index_price/{symbol}
     * */
    public function getKlineIndexPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/kline/index_price/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/kline/fair_price/{symbol}
     * */
    public function getKlineFairPrice(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/kline/fair_price/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/deals/{symbol}
     * */
    public function getDeals(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/deals/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/ticker
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/ticker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/risk_reverse
     * */
    public function getRiskReverse(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/risk_reverse';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/risk_reverse/history
     * */
    public function getRiskReverseHistory(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/risk_reverse/history';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/contract/funding_rate/history
     * */
    public function getFundingRateHistory(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/contract/funding_rate/history';
        $this->data=$data;
        return $this->exec();
    }
}

<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class Position extends Request
{
    /**
     *GET api/v1/private/position/history_positions
     * */
    public function getHistoryPositions(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/position/history_positions';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/position/open_positions
     * */
    public function getOpenPositions(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/position/open_positions';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/position/funding_records
     * */
    public function getFundingRecords(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/position/funding_records';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/position/change_margin
     * */
    public function postChangeMargin(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/position/change_margin';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/position/change_leverage
     * */
    public function postChangeLeverage(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/position/change_leverage';
        $this->data=$data;
        return $this->exec();
    }
}

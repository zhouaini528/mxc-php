<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class Account extends Request
{
    /**
     *GET api/v1/private/account/assets
     * */
    public function getAssets(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/account/assets';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/account/asset/{currency}
     * */
    public function getAsset(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/account/asset/'.$data['currency'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/account/transfer_record
     * */
    public function getTransferRecord(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/account/transfer_record';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/account/risk_limit
     * */
    public function getRiskLimit(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/account/risk_limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/account/tiered_fee_rate
     * */
    public function getTieredFeeRate(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/account/tiered_fee_rate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/account/change_risk_level
     * */
    public function postChangeRiskLevel(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/account/change_risk_level';
        $this->data=$data;
        return $this->exec();
    }
}

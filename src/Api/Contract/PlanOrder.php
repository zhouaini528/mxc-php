<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class PlanOrder extends Request
{
    /**
     *GET api/v1/private/planorder/orders
     * */
    public function getOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/planorder/orders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/planorder/place
     * */
    public function postPlace(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/planorder/place';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/planorder/cancel
     * */
    public function postCancel(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/planorder/cancel';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/planorder/cancel_all
     * */
    public function postCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/planorder/cancel_all';
        $this->data=$data;
        return $this->exec();
    }
}

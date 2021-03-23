<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class StopOrder extends Request
{
    /**
     *GET api/v1/private/stoporder/orders
     * */
    public function getOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/stoporder/orders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/stoporder/order_details/{stop_order_id}
     * */
    public function getOrderDetails(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/stoporder/order_details/'.$data['stop_order_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/stoporder/cancel
     * */
    public function postCancel(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/stoporder/cancel';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/stoporder/cancel_all
     * */
    public function postCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/stoporder/cancel_all';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/stoporder/change_price
     * */
    public function postChangePrice(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/stoporder/change_price';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/stoporder/change_plan_price
     * */
    public function postChangePlanPrice(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/stoporder/change_plan_price';
        $this->data=$data;
        return $this->exec();
    }
}

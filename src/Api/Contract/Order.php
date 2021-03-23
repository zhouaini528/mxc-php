<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Contract;

use Lin\Mxc\Request;

class Order extends Request
{
    /**
     *GET api/v1/private/order/open_orders/{symbol}
     * */
    public function getOpenOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/open_orders/'.$data['symbol'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/order/history_orders
     * */
    public function getHistoryOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/history_orders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/order/external/{symbol}/{external_oid}
     * */
    public function getExternal(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/external/'.$data['symbol'].'/'.$data['external_oid'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/order/get/{order_id}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/get/'.$data['order_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /api/v1/private/order/batch_query
     * */
    public function getBatchQuery(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/batch_query';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/order/deal_details/{order_id}
     * */
    public function getDealDetails(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/deal_details/'.$data['order_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET api/v1/private/order/order_deals
     * */
    public function getOrderDeals(array $data=[]){
        $this->type='GET';
        $this->path='/api/v1/private/order/order_deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/order/submit
     * */
    public function postSubmit(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/order/submit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/order/submit_batch
     * */
    public function postSubmitBatch(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/order/submit_batch';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/order/cancel
     * */
    public function postCancel(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/order/cancel';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/order/cancel_with_external
     * */
    public function postCancelWithExternal(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/order/cancel_with_external';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST api/v1/private/order/cancel_all
     * */
    public function postCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/api/v1/private/order/cancel_all';
        $this->data=$data;
        return $this->exec();
    }

}

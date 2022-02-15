<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Orders extends Request
{
    /**
     * POST /open/api/v2/order/place
     * */
    public function postPlace(array $data=[]){
        $this->type='POST';
        $this->path='/open/api/v2/order/place';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *DELETE /open/api/v2/order/cancel
     * */
    public function deleteCancel(array $data=[]){
        $this->type='DELETE';
        $this->path='/open/api/v2/order/cancel';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /open/api/v2/order/place_batch
     * */
    public function postPlaceBatch(array $data=[]){
        $this->type='POST';
        $this->path='/open/api/v2/order/place_batch';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/order/open_orders
     * */
    public function getOpenOrders(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/order/open_orders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/order/list
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/order/list';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/order/query
     * */
    public function getQuery(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/order/query';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/order/deals
     * */
    public function getDeals(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/order/deals';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/order/deal_detail
     * */
    public function getDealDetail(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/order/deal_detail';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *DELETE /open/api/v2/order/cancel_by_symbol
     * */
    public function deleteCancelBySymbol(array $data=[]){
        $this->type='DELETE';
        $this->path='/open/api/v2/order/cancel_by_symbol';
        $this->data=$data;
        return $this->exec();
    }
}
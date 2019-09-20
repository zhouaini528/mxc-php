<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Orders extends Request
{
    /**
     * GET /open/api/v1/private/current/orders 获取当前委托信息
     * */
    public function getCurrent(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/private/current/orders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * POST /open/api/v1/private/order 下单
     * */
    public function post(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/private/order';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *  DELETE /open/api/v1/private/order 取消订单
     * */
    public function delete(array $data=[]){
        $this->type='DELETE';
        $this->path='/open/api/v1/private/order';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/private/orders 查询账号历史委托记录
     * */
    public function getAll(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/private/orders';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     * GET /open/api/v1/private/order 查询订单状态
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v1/private/order';
        $this->data=$data;
        return $this->exec();
    }
}
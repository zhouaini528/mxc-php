<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Common extends Request
{
    /**
     *GET /open/api/v2/common/rate_limit
     * */
    public function getRateLimit(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/common/rate_limit';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/common/timestamp
     * */
    public function getTimestamp(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/common/timestamp';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /open/api/v2/common/ping
     * */
    public function getPing(array $data=[]){
        $this->type='GET';
        $this->path='/open/api/v2/common/ping';
        $this->data=$data;
        return $this->exec();
    }
}
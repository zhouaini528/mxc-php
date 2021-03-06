<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc\Api\Spot;

use Lin\Mxc\Request;

class Accounts extends Request
{
    /**
     * GET /open/api/v2/account/info 获取账户资产信息
     * */
    public function getInfo(){
        $this->type='GET';
        $this->path='/open/api/v2/account/info';
        return $this->exec();
    }
}
<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc;


use Lin\Mxc\Api\Contract\Account;
use Lin\Mxc\Api\Contract\Market;
use Lin\Mxc\Api\Contract\Order;
use Lin\Mxc\Api\Contract\PlanOrder;
use Lin\Mxc\Api\Contract\Position;
use Lin\Mxc\Api\Contract\StopOrder;

class MxcContract
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://contract.mexc.com'){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
    }

    /**
     *
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'passphrase'=>$this->passphrase,
            'host'=>$this->host,
            'options'=>$this->options,

            'platform'=>'contract',
            'version'=>'v1',
        ];
    }

    /**
     *
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    public function account(){
        return  new Account($this->init());
    }

    /**
     *
     * */
    public function market(){
        return  new Market($this->init());
    }

    /**
     *
     * */
    public function order(){
        return  new Order($this->init());
    }

    /**
     *
     * */
    public function planorder(){
        return  new PlanOrder($this->init());
    }

    /**
     *
     * */
    public function position(){
        return  new Position($this->init());
    }

    /**
     *
     * */
    public function stoporder(){
        return  new StopOrder($this->init());
    }
}

<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc;


use Lin\Mxc\Api\Spot\Accounts;
use Lin\Mxc\Api\Spot\Market;
use Lin\Mxc\Api\Spot\Orders;
use Lin\Mxc\Api\Spot\Common;

class MxcSpot
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://www.mexc.com'){
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

            'platform'=>'spot',
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
        return  new Accounts($this->init());
    }

    /**
     *
     * */
    public function common(){
        return  new Common($this->init());
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
        return  new Orders($this->init());
    }
}

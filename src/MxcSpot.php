<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc;


use Lin\Mxc\Api\Spot\Accounts;
use Lin\Mxc\Api\Spot\Data;
use Lin\Mxc\Api\Spot\Orders;

class MxcSpot
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;
    
    protected $options=[];
    
    function __construct(string $key='',string $secret='',string $host='https://www.mxc.com'){
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
    public function data(){
        return  new Data($this->init());
    }
    
    /**
     *
     * */
    public function order(){
        return  new Orders($this->init());
    }
}
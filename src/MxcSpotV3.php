<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc;


use Lin\Mxc\Api\SpotV3\Privates;
use Lin\Mxc\Api\SpotV3\Publics;

class MxcSpotV3
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://api.mexc.com'){
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
            'version'=>'v3',
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
    public function privates(){
        return  new Privates($this->init());
    }

    /**
     *
     * */
    public function publics(){
        return  new Publics($this->init());
    }
}

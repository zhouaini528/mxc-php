<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Mxc;

use GuzzleHttp\Exception\RequestException;
use Lin\Mxc\Exceptions\Exception;

class Request
{
    protected $key='';

    protected $secret='';

    protected $host='';

    protected $nonce='';

    protected $signature='';

    protected $headers=[];

    protected $type='';

    protected $path='';

    protected $data=[];

    protected $options=[];

    protected $authentication=true;

    protected $platform='';

    protected $version='';

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? 'https://www.mxc.com/';

        $this->options=$data['options'] ?? [];

        $this->platform=$data['platform'] ?? [];
        $this->version=$data['version'] ?? [];
    }

    /**
     *
     * */
    protected function auth(){
        $this->nonce();

        $this->signature();

        $this->headers();

        $this->options();
    }

    /**
     *
     * */
    protected function nonce(){
        $this->nonce=time()*1000;
    }

    /**
     *
     * */
    protected function signature(){
        if($this->authentication==false) return;

        if($this->type=='GET'){
            $params= empty($this->data) ? '' : implode('&',$this->sort($this->data));
        }else{
            $params= empty($this->data) ? '' : json_encode($this->data);
        }

        //accessKey+时间戳+获取到的参数字符串
        $what = $this->key . $this->nonce . $params;
        //echo $what.PHP_EOL;
        $this->signature = hash_hmac("sha256", $what, $this->secret);
    }

    /**
     *
     * */
    protected function headers(){
        $this->headers=[
            'Content-Type' => 'application/json',
            'ApiKey' => $this->key,
            'Request-Time'=>$this->nonce,
            'Signature'=>$this->signature,
        ];
    }

    /**
     *
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;

        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
    }

    /**
     *
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();

        $url=$this->host.$this->path;

        if($this->type=='GET') $url.= empty($this->data) ? '' : '?'.http_build_query($this->data);
        else $this->options['body']=json_encode($this->data);

        //echo $url.PHP_EOL;
        //print_r($this->options);
        //die;

        $response = $client->request($this->type, $url, $this->options);

        return $response->getBody()->getContents();
    }

    /*
     *
     * */
    protected function exec(){
        $this->auth();

        try {
            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();

                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }

            $temp['_httpcode']=$e->getCode();

            throw new Exception(json_encode($temp));
        }
    }

    /**
     *
     * */
    protected function sort($param)
    {
        $u = [];
        $sort_rank = [];
        foreach ($param as $k => $v) {
            $u[] = $k . "=" . urlencode($v);
            $sort_rank[] = ord($k);
        }
        asort($u);

        return $u;
    }
}

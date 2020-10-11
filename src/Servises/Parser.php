<?php


namespace App\Servises;


class Parser
{
    public function getPage($params = [])
    {
        if($params) {
            $useragent      = !empty($params["useragent"]) ? $params["useragent"] : "Mozilla/5.0 (Windows NT 6.3; W…) Gecko/20100101 Firefox/57.0";
            $timeout        = !empty($params["timeout"]) ? $params["timeout"] : 5;
            $connecttimeout = !empty($params["connecttimeout"]) ? $params["connecttimeout"] : 5;
            $head           = !empty($params["head"]) ? $params["head"] : false;

            $cookie_file    = !empty($params["cookie"]["file"]) ? $params["cookie"]["file"] : false;
            $cookie_session = !empty($params["cookie"]["session"]) ? $params["cookie"]["session"] : false;

            $proxy_ip   = !empty($params["proxy"]["ip"]) ? $params["proxy"]["ip"] : false;
            $proxy_port = !empty($params["proxy"]["port"]) ? $params["proxy"]["port"] : false;
            $proxy_type = !empty($params["proxy"]["type"]) ? $params["proxy"]["type"] : false;

            $headers = !empty($params["headers"]) ? $params["headers"] : false;

            $post = !empty($params["post"]) ? $params["post"] : false;
            if(!empty($params["url"])) {
                $url = $params["url"];
                if($cookie_file){
                    file_put_contents(__DIR__."/".$cookie_file, "");
                }



            }
        }
        return false;
    }

}
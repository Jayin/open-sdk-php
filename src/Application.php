<?php

// +----------------------------------------------------------------------
// | Copyright (c) Zhutibang.Inc 2016 http://zhutibang.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jayin Ton <tonjayin@gmail.com>
// +----------------------------------------------------------------------

namespace OpenZhutibang;

use GuzzleHttp\Client;

/**
 * Class Application
 *
 * @property Notice notice
 * @property Client client
 *
 * @package OpenZhutibang
 */
class Application {

    private $config = [
        'appid' => '',
        'secret_key' => ''
    ];

    public function __construct(array $config = []) {
        $this->config = array_merge($this->config, $config);

        $this->client = new Client();
        $this->notice = new Notice($this);
    }


    public function __get($name) {
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }

        switch (strtolower($name)) {
            case 'client':
                return $this->httpclient;
            case 'notice':
                return $this->notice;
        }

        return null;
    }


}
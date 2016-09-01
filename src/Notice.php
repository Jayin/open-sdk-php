<?php

// +----------------------------------------------------------------------
// | Copyright (c) Zhutibang.Inc 2016 http://zhutibang.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jayin Ton <tonjayin@gmail.com>
// +----------------------------------------------------------------------

namespace OpenZhutibang;

use GuzzleHttp\Client;

/**
 * 模板消息
 *
 * @property Application app
 * @package OpenZhutibang
 */
class Notice {

    private $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * @param array $message
     *  [
            'touser' => 'user-openid',
            'template_id' => 'template-id',
            'url' => 'xxxxx',
            'topcolor' => '#f7f7f7',
            'data' => [
                "first"    => "恭喜你购买成功！",
                "keynote1" => "巧克力",
                "keynote2" => "39.8元",
                "keynote3" => "2014年9月16日",
                "remark"   => "欢迎再次购买！"
            ],
        ]
     *
     * @return mixed
     *
     */
    public function send($message) {
        $client = $this->app->client;
        $req_url = $this->get_send_url();
        $message['data'] = json_encode($message['data']);
        $response = $client->request('POST', $req_url, [
            'form_params' => $message
        ]);
        $body = $response->getBody();
//        var_dump((string)$body);
        return json_decode($body, true);

    }


    private function get_send_url() {
        $appid = (string)$this->app->appid;
        $secret_key = (string)$this->app->secret_key;
        $time = time();
        $sign = md5($appid . $time . $secret_key);

        return "http://open.zhutibang.cn/api/template_api/send_template/app_id/{$appid}.html?time={$time}&sign={$sign}";
    }

}
<?php

// +----------------------------------------------------------------------
// | Copyright (c) Zhutibang.Inc 2016 http://zhutibang.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jayin Ton <tonjayin@gmail.com>
// +----------------------------------------------------------------------


namespace test;

require __DIR__ . '/../vendor/autoload.php';


require __DIR__ . '/../src/Application.php';
require __DIR__ . '/../src/Notice.php';


$app = new \OpenZhutibang\Application([
    'appid' => 'wx783f316670f7c86d',
    'secret_key' => '8f7369152601a9392f941511e2b1457f'
]);

$message = [
    'touser' => 'oybyTt6vMZQ3HZYam47hJrBZk0iw',
    'template_id' => 'VdBZe8SF5SZCbV3sgF7PaUsjAkTOLeb8sp1vQ9axoBA',
    'url' => 'http://www.baidu.com',
    'topcolor' => '#f7f7f7',
    'data' => [
        "first" => "恭喜你购买成功！",
        "keynote1" => "巧克力",
        "keynote2" => "39.8元",
        "remark" => "欢迎再次购买！"
    ],
];

//var_dump($app->notice);
$result = $app->notice->send($message);


var_dump($result);
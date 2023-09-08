<?php

return [
    'base_url' => 'http://test-api.crmeb.com/api/v2',

    'base_cache_prefix' => 'sms-crmeb-yihaotong-',

    'base_cache_timeout' => 300,

    'expires' => 3600,

    'redis' => [
        // 服务器地址
        'host' => '127.0.0.1',
        // 端口
        'port' => '6379',
        // 密码
        'password' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
        // 缓存前缀
        'prefix' => '',
        // 缓存标签前缀
        'tag_prefix' => '',
        // 数据库 0号数据库
        'select' => 0,

        'timeout' => 0
    ],
];

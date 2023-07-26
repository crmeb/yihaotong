# 一号通

#### 介绍
一号通composer包,内部包含一号通接口短信服务、复制商品服务、打印面单服务
、商家寄件服务

#### 使用示例

thinkphp6.*中使用
```phpregexp
<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use think\facade\Cache;

 $accessToken = app()->make(AccessToken::class, [
        [
            'access_key' => '',
            'secret_key' => '',
        ],
        Cache::store('redis')->handler()
    ]);
  
  
 $url = '采集商品的url地址';
 $res = Factory::collet($accessToken)->collet($url);

```

```phpregexp

laravel8.*中使用
<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use Illuminate\Support\Facades\Cache;

 $accessToken = app()->make(AccessToken::class, [
        [
            'access_key' => '',
            'secret_key' => '',
        ],
        Cache::store('redis')->getStore()
    ]);
  
  
 $url = '采集商品的url地址';
 $res = Factory::collet($accessToken)->collet($url);

```

#### 官方地址

一号通用户端地址：https://api.crmeb.com
一号通接口文档地址：https://api.crmeb.com/docs/

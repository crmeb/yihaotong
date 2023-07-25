<?php

namespace Crmeb\Yihaotong\Application;


use Crmeb\Yihaotong\AccessToken;

/**
 * 发票服务
 * Class InvoiceClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/7/21
 * @package Crmeb\Yihaotong\Application
 */
class InvoiceClient
{

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * InvoiceClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }
}

<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;

/**
 * 复制商品
 * Class CollectClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/14
 * @package Crmeb\Yihaotong\Application
 */
class CollectClient
{
    /**
     * 获取详情
     */
    const PRODUCT_GOODS = 'v2/copy/goods';

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * SmsClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }

    /**
     * 复制商品
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function goods(string $url)
    {
        $param['url'] = $url;

        return $this->client->request(self::PRODUCT_GOODS, 'post', $param);
    }
}

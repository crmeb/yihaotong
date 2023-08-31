<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;
use GuzzleHttp\Exception\GuzzleException;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * Class AuthClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong\Application
 */
class AuthClient
{
    //获取用户信息
    const USER_INFO = '/user/info';

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * @var array
     */
    protected $userInfo;

    /**
     * AutoClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }

    /**
     * 获取用户信息
     * @return array
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function userInfo()
    {
        return $this->client->request(self::USER_INFO, 'post');
    }
}

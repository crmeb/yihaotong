<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;

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

    const MEAL_TYPE = ['sms', 'query', 'dump', 'copy'];

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function userInfo(bool $cache = true)
    {
        $account = $this->client->getAccessKey();
        $key = 'user_info_' . $account;

        if ($cache) {
            if ($this->client->getCache()->has($key)) {
                $userInfo = $this->client->getCache()->get($key);
            }
        }

        if (!isset($userInfo) || !$cache) {

            $userInfo = $this->client->request(self::USER_INFO, 'post');

            if (isset($userInfo['status']) && $userInfo['status'] == 200) {

                $this->client->getCache()->set($key, $userInfo);

            }

        }

        return $userInfo;
    }
}

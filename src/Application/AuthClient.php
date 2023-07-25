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
    const USER_INFO = 'v2/user/info';
    //用户消费记录
    const USER_BILL = 'v2/user/bill';
    //用量记录
    const USER_RECORD = 'v2/user/record';

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


    /**
     * 用户消费记录
     * @param int $page
     * @param int $limit
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function userBill(int $page, int $limit)
    {
        return $this->client->request(self::USER_BILL, 'post', ['page' => $page, 'limit' => $this->client->checkLimit($limit)]);
    }

    /**
     * 用量记录
     * @param int $page
     * @param int $limit
     * @param int $type
     * @param string $status
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function userRecord(int $page, int $limit, int $type, string $status = '')
    {
        $typeContent = [1 => 'sms', 2 => 'expr_dump', 3 => 'expr_query', 4 => 'copy'];
        if (!isset($typeContent[$type])) {
            throw new YiHaoTongException('参数类型不正确');
        }

        $data = ['page' => $page, 'limit' => $limit, 'type' => $typeContent[$type]];
        if ($type == 1 && $status != '') {
            $data['status'] = $status;
        }

        return $this->client->request(self::USER_RECORD, 'post', $data);
    }
}

<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 短信服务
 * Class SmsClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/13
 * @package Crmeb\Yihaotong\Application
 */
class SmsClient
{

    //发送短信
    const SMS_SEND = '/sms_v2/send';
    //短信模板
    const SMS_TEMPS = '/sms_v2/temps';
    //发送记录
    const SMS_RECORD = '/sms_v2/record';

    const TEMP_TYPE_CODE = 0;//短信类型
    const TEMP_TYPE_NONET = 1;//通知类型
    const TEMP_TYPE_MARKETING = 2;//营销类型

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
     * 发送短信
     * @param string $phone
     * @param string $tempId
     * @param array $data
     * @param string|null $host
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function send(string $phone, string $tempId, array $data = [], string $host = null)
    {
        if (!$phone) {
            throw new YiHaoTongException('发送手机号不能为空');
        }

        if (!$tempId) {
            throw new YiHaoTongException('短信模板ID必须不能为空');
        }

        return $this->client->request(self::SMS_SEND, 'post', [
            'phone' => $phone,
            'host' => $host ?: '',
            'temp_id' => $tempId,
            'param' => json_encode($data)
        ]);
    }

    /**
     * 发送记录
     * @param string $phone
     * @param string $status
     * @param string $createdAt
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function smsRecord(string $phone = '', string $status = '', string $createdAt = '', int $page = 1, int $limit = 10)
    {
        return $this->client->request(self::SMS_RECORD, 'get', [
            'phone' => $phone,
            'status' => $status,
            'created_at' => $createdAt,
            'page' => $page,
            'limit' => $limit
        ]);
    }

    /**
     * 获取短信模板
     * @param int $page
     * @param int $limit
     * @param int $type
     * @return array|mixed
     * @throws GuzzleException
     */
    public function temps(int $page = 0, int $limit = 10, int $type = 1)
    {
        $param = [
            'page' => $page,
            'limit' => $limit,
            'temp_type' => $type
        ];
        return $this->client->request(self::SMS_TEMPS, 'post', $param);
    }

}

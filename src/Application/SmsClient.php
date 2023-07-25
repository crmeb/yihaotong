<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;

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
    const SMS_SEND = 'v2/sms_v2/send';
    //短信模板
    const SMS_TEMPS = 'v2/sms_v2/temps';
    //申请模板
    const SMS_APPLY = 'v2/sms_v2/apply';
    //模板记录
    const SMS_APPLYS = 'v2/sms_v2/applys';
    //发送记录
    const SMS_RECORD = 'v2/sms_v2/record';

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
     * @param string|null $appid 应用id可以不填写,不填写为当前账号默认短信应用
     * @return mixed
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
     * @param int $recordId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function smsRecord(int $recordId)
    {
        return $this->client->request(self::SMS_RECORD, 'post', ['record_id' => $recordId]);
    }

    /**
     * @param int $tempType
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function smsApplys(int $tempType = self::TEMP_TYPE_CODE, int $page = 1, int $limit = 10)
    {
        if (!in_array($tempType, [self::TEMP_TYPE_CODE, self::TEMP_TYPE_NONET, self::TEMP_TYPE_MARKETING])) {
            throw new YiHaoTongException('类型错误');
        }

        return $this->client->request(self::SMS_APPLYS, 'post', [
            'temp_type' => $tempType,
            'page' => $page,
            'limit' => $this->client->checkLimit($limit),
        ]);
    }

    /**
     * 获取短信模板
     * @param int $page
     * @param int $limit
     * @param int $type
     * @return array|mixed
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

    /**
     * 申请模版
     * @param $title
     * @param $content
     * @param $type
     * @return array|bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apply(string $title, string $content, int $type)
    {
        $param = [
            'title' => $title,
            'content' => $content,
            'type' => $type
        ];
        return $this->client->request(self::SMS_APPLY, 'post', $param);
    }

}

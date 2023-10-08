<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Option\DumpOption;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 快递相关服务
 * Class ExpressClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/14
 * @package Crmeb\Yihaotong\Application
 */
class ExpressClient
{
    //电子面单模版
    const EXPRESS_TEMP = '/expr_dump/temp';

    //快递公司
    const EXPRESS_LIST = '/expr/express';

    //快递查询
    const EXPRESS_QUERY = '/expr/query';

    //面单打印
    const EXPRESS_DUMP = '/expr_dump/dump';

    //电子面单复打
    const EXPRESS_REPEAT_DUMP = '/expr_dump/repeat_dump';

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
     * 获取电子面单模版
     * @param string $com 快递公司编号
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function temp(string $com, bool $isSiid = false)
    {
        $param = [
            'com' => $com
        ];

        $header = [];
        if (!$isSiid) {
            $header = ['version' => 'v1.1'];
        }

        return $this->client->request(self::EXPRESS_TEMP, 'get', $param, $header);
    }

    /**
     * 获取物流公司列表
     * @param int $type 快递类型：1，国内运输商；2，国际运输商；3，国际邮政
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function express(int $type = 0, int $page = 0, int $limit = 20)
    {
        if ($type) {
            $param = [
                'type' => $type,
                'page' => $page,
                'limit' => $limit
            ];
        } else {
            $param = [];
        }

        return $this->client->request(self::EXPRESS_LIST, 'get', $param);
    }

    /**
     * 查询物流信息
     * @param string $num
     * @param string $com
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function query(string $num, string $com = '')
    {
        $param = [
            'com' => $com,
            'num' => $num
        ];
        if ($com === null) {
            unset($param['com']);
        }

        return $this->client->request(self::EXPRESS_QUERY, 'post', $param);
    }

    /**
     * 电子面单打印
     * @param DumpOption $option
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function dump(DumpOption $option)
    {

        $param = $option->toArray();

        $data = [
            'partner_id' => $option->partnerId,
            'partner_key' => $option->partnerKey,
            'net' => $option->net,
            'check_man' => $option->checkMan,
            'customer_name' => $option->customerName,
            'code' => $option->code,
        ];

        unset($param['partner_id'],
            $param['partner_key'],
            $param['net'],
            $param['check_man'],
            $param['customer_name'],
            $param['code']);

        $expressData = $this->temp($param['com']);


        if (1 == $expressData['partner_id']) {
            $param['partner_id'] = $data['partner_id'];
            if (!$param['partner_id']) {
                throw new YiHaoTongException('电子面单客户账户缺失');
            }
        }

        if (1 == $expressData['partner_key']) {
            $param['partner_key'] = $data['partner_key'];
            if (!$param['partner_key']) {
                throw new YiHaoTongException('电子面单密码缺失');
            }
        }

        if (1 == $expressData['net']) {
            $param['net'] = $data['net'];
            if (!$param['net']) {
                throw new YiHaoTongException('收件网点名称必须填写');
            }
        }

        if (1 == $expressData['check_man']) {
            $param['checkMan'] = $data['check_man'];
            if (!$param['checkMan']) {
                throw new YiHaoTongException('电子面单承载快递员名必须填写');
            }
        }

        if (1 == $expressData['partner_name']) {
            $param['partnerName'] = $data['customer_name'];
            if (!$param['partnerName']) {
                throw new YiHaoTongException('电子面单客户账户名称必须填写');
            }
        }

        if (1 == $expressData['is_code']) {
            $param['code'] = $data['code'];
            if (!$param['code']) {
                throw new YiHaoTongException('电子面单承载编号必须填写');
            }
        }

        $header = [];
        if (!empty($param['siid'])) {
            $param['print_type'] = 'IMAGE';
            $header['version'] = 'v1.1';
        }

        return $this->client->request(self::EXPRESS_DUMP, 'post', $param, $header);
    }

    /**
     * 电子面单复打
     * @param string $taskId
     * @param string $siid
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/10/8
     */
    public function repeatDump(string $taskId, string $siid = '')
    {
        return $this->client->request(self::EXPRESS_REPEAT_DUMP, 'post', ['task_id' => $taskId, 'siid' => $siid]);
    }
}

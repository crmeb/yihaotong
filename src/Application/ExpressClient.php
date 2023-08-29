<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\AccessToken;
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
     * @param array $data 必需参数: com(快递公司编码)、to_name(寄件人)、to_tel（寄件人电话）、to_addr（寄件人详细地址）、from_name（收件人）、from_tel（收件人电话)、from_addr（收件人地址）、temp_id（电子面单模板ID）、siid（云打印机编号）、count（商品数量）
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function dump(array $data)
    {
        $param = $data;
        $param['com'] = $data['com'] ?? '';
        if (!$param['com']) {
            throw new YiHaoTongException('快递公司编码缺失');
        }

        $param['to_name'] = $data['to_name'] ?? '';
        $param['to_tel'] = $data['to_tel'] ?? '';
        $param['order_id'] = $data['order_id'] ?? '';
        $param['to_addr'] = $data['to_addr'] ?? '';
        if (!$param['to_addr'] || !$param['to_tel'] || !$param['to_name']) {
            throw new YiHaoTongException('寄件人信息缺失');
        }

        $param['from_name'] = $data['from_name'] ?? '';
        $param['from_tel'] = $data['from_tel'] ?? '';
        $param['from_addr'] = $data['from_addr'] ?? '';
        if (!$param['from_name'] || !$param['from_tel'] || !$param['from_addr']) {
            throw new YiHaoTongException('收件人信息缺失');
        }

        $param['temp_id'] = $data['temp_id'] ?? '';
        if (!$param['temp_id']) {
            throw new YiHaoTongException('电子面单模板ID缺失');
        }

        $param['count'] = $data['count'] ?? '';
        $param['cargo'] = $data['cargo'] ?? '';

        if (!$param['count']) {
            throw new YiHaoTongException('商品数量缺失');
        }

        $expressData = $this->temp($param['com']);

        if (!empty($data['cargo'])) {
            $param['cargo'] = $data['cargo'];
        }

        if (1 == $expressData['partner_id']) {
            $param['partner_id'] = $expressData['account'];
        }

        if (1 == $expressData['partner_key']) {
            $param['partner_key'] = $expressData['key'];
        }

        if (1 == $expressData['net']) {
            $param['net'] = $expressData['net_name'];
        }

        if (1 == $expressData['check_man']) {
            $param['checkMan'] = $expressData['courier_name'];
        }

        if (1 == $expressData['partner_name']) {
            $param['partnerName'] = $expressData['customer_name'];
        }

        if (1 == $expressData['is_code']) {
            $param['code'] = $expressData['code_name'];
        }

        $header = [];
        if (!empty($param['siid'])) {
            $param['print_type'] = 'IMAGE';
            $header['version'] = 'v1.1';
        }

        return $this->client->request(self::EXPRESS_DUMP, 'post', $param, $header);
    }
}

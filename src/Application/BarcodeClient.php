<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Exception\YiHaoTongException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 商品条形码查询服务
 * Class BarcodeClient
 */
class BarcodeClient
{
    // 条码查询(唯一入口,渠道由一号通后台配置决定)
    const BARCODE_QUERY = '/barcode/query';
    // 查询记录列表
    const BARCODE_RECORD = '/barcode/record';
    // 服务信息(余量/状态/当前渠道)
    const BARCODE_INFO = '/barcode/info';

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * BarcodeClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }

    /**
     * 条码查询
     * @param string $barcode 商品条形码,8~14位数字
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function query(string $barcode)
    {
        $barcode = trim($barcode);

        if (!$barcode) {
            throw new YiHaoTongException('商品条形码不能为空');
        }

        if (!preg_match('/^[0-9]{8,14}$/', $barcode)) {
            throw new YiHaoTongException('条码格式不正确,请输入8~14位数字');
        }

        return $this->client->request(self::BARCODE_QUERY, 'post', [
            'barcode' => $barcode
        ]);
    }

    /**
     * 查询记录列表
     * @param int $page 页码
     * @param int $limit 每页条数
     * @param string $barcode 条码筛选
     * @param string $status 状态筛选:1成功;2失败
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function record(int $page = 1, int $limit = 10, string $barcode = '', string $status = '')
    {
        $param = [
            'page' => $page,
            'limit' => $limit,
        ];

        if ($barcode) {
            $param['barcode'] = $barcode;
        }

        if ('' !== $status) {
            $param['status'] = $status;
        }

        return $this->client->request(self::BARCODE_RECORD, 'get', $param);
    }

    /**
     * 服务信息(余量/状态/当前渠道)
     * @return bool|mixed
     * @throws GuzzleException
     */
    public function info()
    {
        return $this->client->request(self::BARCODE_INFO, 'get');
    }
}

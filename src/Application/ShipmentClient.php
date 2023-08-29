<?php
/**
 *  +----------------------------------------------------------------------
 *  | CRMEB [ CRMEB赋能开发者，助力企业发展 ]
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2016~2022 https://www.crmeb.com All rights reserved.
 *  +----------------------------------------------------------------------
 *  | Licensed CRMEB并不是自由软件，未经许可不能去掉CRMEB相关版权
 *  +----------------------------------------------------------------------
 *  | Author: CRMEB Team <admin@crmeb.com>
 *  +----------------------------------------------------------------------
 */

namespace Crmeb\Yihaotong\Application;


use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Option\CreateOrderOption;
use GuzzleHttp\Exception\GuzzleException;

/**
 * 商家寄件
 * Class ShipmentClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 * @package Crmeb\Yihaotong\Application
 */
class ShipmentClient
{
    //获取商家寄件订单列表
    const SHIPMENT_INDEX = '/shipment/index';
    //创建商家寄件订单
    const CREATE_ORDER = '/shipment/create_order';
    //取消商家寄件
    const CANCEL_ORDER = '/shipment/cancel_order';
    //查询价格
    const QUERY_PRICE = '/shipment/price';
    //快递信息
    const KUAIDI_COMS = '/shipment/get_kuaidi_coms';

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

    /**
     * 获取商家寄件列表
     * @param string $kuaidiNum 快递单号
     * @param string $courierName 送货人姓名
     * @param int $page 页码
     * @param int $limit 展示条数
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getShipmentList(string $kuaidiNum = '', string $courierName = '', int $page = 1, int $limit = 10)
    {
        return $this->client->request(self::SHIPMENT_INDEX, 'get', [
            'kuaidi_num' => $kuaidiNum,
            'courier_name' => $courierName,
            'page' => $page,
            'limit' => $limit
        ]);
    }

    /**
     * 创建商家寄件订单
     * @param CreateOrderOption $option
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function createOrder(CreateOrderOption $option)
    {
        return $this->client->request(self::CREATE_ORDER, 'post', $option->toArray());
    }

    /**
     * 取消商家寄件
     * @param string $taskId
     * @param string $orderId
     * @param string $cancelMsg
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function cancelOrder(string $taskId, string $orderId, string $cancelMsg)
    {
        return $this->client->request(self::CANCEL_ORDER, 'post', [
            'task_id' => $taskId,
            'order_id' => $orderId,
            'cancel_msg' => $cancelMsg,
        ]);
    }

    /**
     * 商家寄件下单价格接口
     * @param string $kuaidicom 快递公司编码
     * @param string $sendAddress 出发地地址，最小颗粒到市级，例如：广东省深圳市
     * @param string $address 目的地地址，最小颗粒到市级，例如：广东省深圳市
     * @param string $weight 重量，单位：kg
     * @param string $serviceType 业务类型
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function queryPrice(string $kuaidicom, string $sendAddress, string $address, string $weight = '', string $serviceType = '')
    {
        return $this->client->request(self::QUERY_PRICE, 'post', [
            'kuaidicom' => $kuaidicom,
            'send_address' => $sendAddress,
            'address' => $address,
            'weight' => $weight,
            'service_type' => $serviceType,
        ]);
    }

    /**
     * 获取快递信息
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getKuaidiComs()
    {
        return $this->client->request(self::KUAIDI_COMS, 'get');
    }
}

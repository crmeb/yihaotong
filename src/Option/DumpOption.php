<?php

namespace Crmeb\Yihaotong\Option;

use Crmeb\Yihaotong\Util\Str;

/**
 * 电子面单打印
 * Class DumpOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 * @package Crmeb\Yihaotong\Option
 */
class DumpOption extends BaseOption
{

    /**
     * 快递公司编码
     * @var string
     */
    public $com;

    /**
     * 寄件人
     * @var string
     */
    public $toName;

    /**
     * 寄件人电话
     * @var string
     */
    public $toTel;

    /**
     * @var string
     */
    public $orderId;

    /**
     * 寄件人详细地址
     * @var string
     */
    public $toAddr;

    /**
     * 收件人
     * @var string
     */
    public $fromName;

    /**
     * 收件人电话
     * @var string
     */
    public $fromTel;

    /**
     * 收件人地址
     * @var string
     */
    public $fromAddr;

    /**
     * 电子面单模板ID
     * @var string
     */
    public $tempId;

    /**
     * 云打印机编号
     * @var string
     */
    public $siid;

    /**
     * 商品数量
     * @var int
     */
    public $count;

    /**
     * 物品名称
     * @var string
     */
    public $cargo;

    /**
     * 电子面单月结账号
     * @var string
     */
    public $partnerId = '';

    /**
     * 电子面单密码
     * @var string
     */
    public $partnerKey = '';

    /**
     * 网点名称
     * @var string
     */
    public $net = '';

    /**
     * 电子面单承载快递员名
     * @var string
     */
    public $checkMan = '';

    /**
     * 电子面单客户账户名称
     * @var string
     */
    public $customerName = '';

    /**
     * 电子面单承载编号
     * @var string
     */
    public $code = '';

    /**
     * DumpOption constructor.
     * @param string $com
     * @param string $toName
     * @param string $toTel
     * @param string $orderId
     * @param string $toAddr
     * @param string $fromName
     * @param string $fromTel
     * @param string $fromAddr
     * @param string $tempId
     * @param string $siid
     * @param int $count
     * @param string $cargo
     */
    public function __construct(string $com = '',
                                string $toName = '',
                                string $toTel = '',
                                string $orderId = '',
                                string $toAddr = '',
                                string $fromName = '',
                                string $fromTel = '',
                                string $fromAddr = '',
                                string $tempId = '',
                                string $siid = '',
                                int $count = 0,
                                string $cargo = ''
    )
    {
        $this->com = $com;
        $this->toName = $toName;
        $this->toTel = $toTel;
        $this->orderId = $orderId;
        $this->toAddr = $toAddr;
        $this->fromName = $fromName;
        $this->fromTel = $fromTel;
        $this->fromAddr = $fromAddr;
        $this->tempId = $tempId;
        $this->siid = $siid;
        $this->count = $count;
        $this->cargo = $cargo;
    }

    /**
     * 数据转换
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function toArray()
    {
        $publicData = get_object_vars($this);

        $data = [];

        foreach ($publicData as $key => $value) {
            $key = Str::snake($key);
            $data[$key] = $value;
        }

        $this->validate(
            [
                'com' => 'require',
                'to_name' => 'require',
                'to_tel' => 'require',
                'to_addr' => 'require',
                'from_name' => 'require',
                'from_tel' => 'require',
                'from_addr' => 'require',
                'temp_id' => 'require',
                'count' => 'require',
            ],
            [
                'com.require' => '快递公司编码缺失',
                'to_name.require' => '寄件人姓名缺失',
                'to_tel.require' => '寄件人电话缺失',
                'to_addr.require' => '寄件人地址缺失',
                'from_name.require' => '收件人姓名缺失',
                'from_tel.require' => '收件人电话缺失',
                'from_addr.require' => '收件人地址缺失',
                'temp_id.require' => '电子面单模板ID缺失',
                'count.require' => '商品数量缺失',
            ], $data);

        return $data;
    }
}

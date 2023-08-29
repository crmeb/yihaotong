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

namespace Crmeb\Yihaotong\Option;


use Crmeb\Yihaotong\Util\Str;

class CreateOrderOption extends BaseOption
{

    /**
     * 快递公司编码
     * @var string
     */
    public $kuaidicom;

    /**
     * 收件人姓名
     * @var string
     */
    public $manName;

    /**
     * 收件人手机号
     * @var string
     */
    public $phone;

    /**
     * 收件人所在完整地址
     * @var string
     */
    public $address;

    /**
     * 寄件人姓名
     * @var string
     */
    public $sendRealName;

    /**
     * 寄件人手机号
     * @var string
     */
    public $sendPhone;

    /**
     * 寄件人所在完整地址
     * @var string
     */
    public $sendAddress;

    /**
     * 订单信息回调地址
     * @var string
     */
    public $callBackUrl;

    /**
     * 物品名称 快递公司为京东或圆通时，物品名称必须填写
     * @var string
     */
    public $cargo;

    /**
     * 业务类型，默认为标准快递
     * @var
     */
    public $serviceType;

    /**
     * 支付方式，SHIPPER: 寄付（默认）。不支持到付
     * @var string
     */
    public $payment;

    /**
     * 物品总重量KG，不需带单位
     * @var string
     */
    public $weight;

    /**
     * 备注
     * @var string
     */
    public $remark;

    /**
     * 预约时间
     * @var int 0=今天，1=明天，2=后天
     */
    public $dayType;

    /**
     * 预约起始时间（HH:mm），例如：09:00，顺丰必填
     * @var string
     */
    public $pickupStartTime;

    /**
     * 预约截止时间（HH:mm），例如：10:00，顺丰必填，预约起始时间和预约截止时间间隔需≥1小时
     * @var string
     */
    public $pickupEndTime;

    /**
     * 渠道ID，如有多个同品牌运力，请联系商务提供后传入
     * @var string
     */
    public $channelSw;

    /**
     * 保价额度
     * @var
     */
    public $valinsPay;

    /**
     * 寄件人实名信息（圆通、极兔支持 ）
     * @var string
     */
    public $realName;

    /**
     * 寄件人证件类型，1：居民身份证 ；2：港澳居民来往内地通行证 ；3：台湾居民来往大陆通行证 ；4：中国公民护照（圆通、极兔支持 ）
     * @var string
     */
    public $sendIdCardType;

    /**
     * 寄件人证件号码 （圆通、极兔支持 ）
     * @var string
     */
    public $sendIdCard;

    /**
     * 是否口令签收，Y：需要 N: 不需要，默认值为N（德邦快递专属参数）
     * @var string
     */
    public $passwordSigning;

    /**
     * 是否开启订阅功能 0：不开启(默认) 1：开启 说明开启订阅功能时：pollCallBackUrl必须填入 此功能只针对有快递单号的单
     * @var string
     */
    public $op;

    /**
     * 如果op设置为1时，pollCallBackUrl必须填入，用于跟踪回调，回调内容通过五、快递信息推送接口返回（免费服务）
     * @var string
     */
    public $pollCallBackUrl;

    /**
     * 添加此字段表示开通行政区域解析功能 。
     * @var string
     */
    public $resultv2;

    /**
     * 面单返回类型，默认为空，不返回面单内容。10：设备打印，20：生成图片短链回调。
     * @var string
     */
    public $returnType;

    /**
     * 设备码，returnType为10时必填
     * @var string
     */
    public $siid;

    /**
     * 模板编码，通过管理后台的电子面单模板信息获取 ，returnType不为空时必填
     * @var string
     */
    public $tempid;

    /**
     * 打印状态回调地址，returnType为10时必填
     * @var string
     */
    public $printCallBackUrl;

    public function __construct(string $kuaidicom = '',
                                string $manName = '',
                                string $phone = '',
                                string $address = '',
                                string $sendRealName = '',
                                string $sendPhone = '',
                                string $sendAddress = '',
                                string $callBackUrl = '')
    {
        $this->kuaidicom = $kuaidicom;
        $this->manName = $manName;
        $this->phone = $phone;
        $this->address = $address;
        $this->sendRealName = $sendRealName;
        $this->sendPhone = $sendPhone;
        $this->sendAddress = $sendAddress;
        $this->callBackUrl = $callBackUrl;
    }

    /**
     * 转换数组
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function toArray()
    {

        $this->validate(
            [
                'kuaidicom' => 'require',
                'manName' => 'require',
                'phone' => 'require',
                'address' => 'require',
                'sendRealName' => 'require',
                'sendPhone' => 'require',
                'sendAddress' => 'require',
            ],
            [
                'kuaidicom.require' => '快递公司编码必须填写',
                'manName.require' => '收件人姓名必须填写',
                'phone.require' => '收件人手机号必须填写',
                'address.require' => '收件人所在完整地址必须填写',
                'sendRealName.require' => '寄件人姓名必须填写',
                'sendPhone.require' => '寄件人手机号必须填写',
                'sendAddress.require' => '寄件人所在完整地址必须填写',
            ],
            [
                'kuaidicom' => $this->kuaidicom,
                'manName' => $this->manName,
                'phone' => $this->phone,
                'address' => $this->address,
                'sendRealName' => $this->sendRealName,
                'sendPhone' => $this->sendPhone,
                'sendAddress' => $this->sendAddress,
            ]
        );

        $publicData = get_object_vars($this);

        $data = [];

        foreach ($publicData as $key => $value) {
            $key = Str::snake($key);
            $data[$key] = $value;
        }

        return $data;
    }
}

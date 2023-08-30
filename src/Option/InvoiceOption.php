<?php

namespace Crmeb\Yihaotong\Option;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\Util\Str;
use Crmeb\Yihaotong\Enum\InvoiceEnum;

/**
 * Class InvoiceOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 */
class InvoiceOption extends BaseOption
{
    /**
     * 可以为订单号,只要是唯一值就可以
     * @var string
     */
    public $unique = '';

    /**
     * 是否含税
     * @var int
     */
    public $isTaxInclusive = 1;

    /**
     * 是否企业
     * @var int
     */
    public $isEnterprise = 1;

    /**
     * 开票类型
     * @var string
     */
    public $invoiceType = '82';

    /**
     * 特定要素类型代码
     * @var string
     */
    public $invoiceTspzType = '';

    /**
     * 购方纳税人号码
     * @var string
     */
    public $taxId = '';

    /**
     * 购方企业名称
     * @var string
     */
    public $accountName = '';

    /**
     * 购方开户银行名称
     * @var string
     */
    public $bankName = '';

    /**
     * 购方银行账户
     * @var string
     */
    public $bankAccount = '';

    /**
     * 购方电话
     * @var string
     */
    public $telephone = '';

    /**
     * 购方地址
     * @var string
     */
    public $companyAddress = '';

    /**
     * 开票人
     * @var string
     */
    public $drawer = '';

    /**
     * 邮箱
     * @var string
     */
    public $email = '';

    /**
     * 商品详情
     * @var array
     */
    public $goods = [];

    /**
     * InvoiceOption constructor.
     * @param string $unique
     * @param int $isTaxInclusive
     * @param int $isEnterprise
     * @param string $invoiceType
     * @param string $invoiceTspzType
     * @param string $taxId
     * @param string $accountName
     * @param string $bankName
     * @param string $bankAccount
     * @param string $telephone
     * @param string $companyAddress
     * @param string $drawer
     * @param string $email
     */
    public function __construct(string $unique,
                                int $isTaxInclusive = 1,
                                int $isEnterprise = 1,
                                string $invoiceType = InvoiceEnum::INVOKE_TYPE_82,
                                string $invoiceTspzType = InvoiceEnum::INVOKE_TSPZ_TYPE_NULL,
                                string $taxId = '',
                                string $accountName = '',
                                string $bankName = '',
                                string $bankAccount = '',
                                string $telephone = '',
                                string $companyAddress = '',
                                string $drawer = '',
                                string $email = ''
    )
    {
        $this->unique = $unique;
        $this->isTaxInclusive = $isTaxInclusive;
        $this->isEnterprise = $isEnterprise;
        $this->invoiceType = $invoiceType;
        $this->invoiceTspzType = $invoiceTspzType;
        $this->taxId = $taxId;
        $this->accountName = $accountName;
        $this->bankName = $bankName;
        $this->bankAccount = $bankAccount;
        $this->telephone = $telephone;
        $this->companyAddress = $companyAddress;
        $this->drawer = $drawer;
        $this->email = $email;
    }

    /**
     * 设置商品
     * @param array $goods
     * @return $this
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function setGoods(array $goods)
    {
        $goodsData = [];

        foreach ($goods as $item) {
            if ($item instanceof GoodsOption) {
                $goodsData[] = $item->toArray();
            } else {
                throw new YiHaoTongException('item要为GoodsOption类实例化后的对象');
            }
        }

        $this->goods = $goodsData;

        return $this;
    }

    /**
     * 数组转换为商品数据
     * @param array $data
     * @param array $keys
     * @return $this
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/30
     */
    public function setDataToGoods(array $data, array $keys = [])
    {
        $goods = [];
        foreach ($data as $item) {
            $goodsOption = new GoodsOption();
            foreach ($item as $k => $v) {
                if (isset($keys[$k])) {
                    $key = $keys[$k];
                    $goodsOption->{$key} = $v;
                } else {
                    $goodsOption->{$k} = $v;
                }
            }
            $goods[] = $goodsOption->toArray();
        }

        $this->goods = $goods;

        return $this;
    }

    /**
     * 转数组
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function toArray()
    {
        $publicData = get_object_vars($this);

        $invoice = [];

        foreach ($publicData as $key => $value) {
            $key = Str::snake($key);
            $invoice[$key] = $value;
        }

        return $invoice;
    }
}

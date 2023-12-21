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


use Crmeb\Yihaotong\Enum\InvoiceEnum;

/**
 * 发票开具
 * Class InvoiceIssuanceOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 * @package Crmeb\Yihaotong\Option
 */
class InvoiceIssuanceOption extends InvoiceOption
{

    /**
     * InvoiceIssuanceOption constructor.
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
    public function __construct(string $unique = '', int $isTaxInclusive = 1, int $isEnterprise = 1, string $invoiceType = InvoiceEnum::INVOKE_TYPE_82, string $invoiceTspzType = InvoiceEnum::INVOKE_TSPZ_TYPE_NULL, string $taxId = '', string $accountName = '', string $bankName = '', string $bankAccount = '', string $telephone = '', string $companyAddress = '', string $drawer = '', string $email = '')
    {
        parent::__construct($unique, $isTaxInclusive, $isEnterprise, $invoiceType, $invoiceTspzType, $taxId, $accountName, $bankName, $bankAccount, $telephone, $companyAddress, $drawer, $email);
    }

    /**
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function toArray()
    {
        $data = parent::toArray();

        unset($data['unique']);

        if ($this->isEnterprise) {
            $this->validate([
                'tax_id' => 'require',
                'invoice_type' => 'require',
                'account_name' => 'require',
                'bank_name' => 'require',
                'bank_account' => 'require',
                'telephone' => 'require',
                'company_address' => 'require',
                'drawer' => 'require',
                'goods.*.store_name' => 'require',
                'goods.*.cate_id' => 'require|gt:0',
                'goods.*.unit_price' => 'require',
                'goods.*.num' => 'require',
            ], [
                'tax_id.require' => '购方纳税人号码不能为空',
                'invoice_type.require' => '开票类型不能为空',
                'account_name.require' => '购方企业名称不能为空',
                'bank_name.require' => '购方开户银行名称不能为空',
                'bank_account.require' => '购方银行账户不能为空',
                'telephone.require' => '购方电话不能为空',
                'company_address.require' => '购方地址不能为空',
                'drawer.require' => '开票人不能为空',
                'goods.*.store_name.require' => '商品名称为必填项',
                'goods.*.cate_id.require' => '商品类目为必填项',
                'goods.*.cate_id.gt' => '商品类目为必填项！',
                'goods.*.unit_price.require' => '商品单价为必填项',
                'goods.*.num.require' => '商品数量为必填项',
                'goods.*.taxRate.require' => '商品税率为必填项',
            ], $data);
        } else {
            $this->validate([
                'invoice_type' => 'require',
                'account_name' => 'require',
                'drawer' => 'require',
                'goods.*.store_name' => 'require',
                'goods.*.cate_id' => 'require|gt:0',
                'goods.*.unit_price' => 'require',
                'goods.*.num' => 'require',
            ], [
                'invoice_type.require' => '开票类型不能为空',
                'account_name.require' => '购方企业名称不能为空',
                'drawer.require' => '开票人不能为空',
                'goods.*.store_name.require' => '商品名称为必填项',
                'goods.*.cate_id.require' => '商品类目为必填项',
                'goods.*.cate_id.gt' => '商品类目为必填项！',
                'goods.*.unit_price.require' => '商品单价为必填项',
                'goods.*.num.require' => '商品数量为必填项',
                'goods.*.taxRate.require' => '商品税率为必填项',
            ], $data);
        }

        return $data;
    }
}

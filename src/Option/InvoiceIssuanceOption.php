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

        foreach ($data['goods'] as $item) {

        }

        return $data;
    }
}

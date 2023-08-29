<?php

namespace Crmeb\Yihaotong\Application;


use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Enum\InvoiceEnum;
use Crmeb\Yihaotong\Option\InvoiceIssuanceOption;
use Crmeb\Yihaotong\Option\InvoiceOption;

/**
 * 发票服务
 * Class InvoiceClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/7/21
 * @package Crmeb\Yihaotong\Application
 */
class InvoiceClient
{
    //获取发票开具页面URL
    const INVOICE_ISSUANCE_URL = '/invoice/invoice_issuance_url';
    //发票开具
    const INVOICE_ISSUANCE = '/invoice/invoice_issuance';
    //获取商品类目
    const INVOICE_CATEGORY = '/invoice/category';
    //获取用户常用类目
    const INVOICE_CATEGORY_USER = '/invoice/category_user';
    //查看发票详情
    const INVOICE_INFO = '/invoice/invoice_info/{invoiceNum}';
    //开具负数发票
    const INVOICE_ISSUANCE_RED = '/invoice/red_invoice_issuance/{invoiceNum}';
    //PDF邮箱推送
    const SEND_PDF_EMAIL = '/invoice/send_pdf_email';
    //下载发票
    const DOWNLOAD_INVOICE = '/invoice/download_invoice/{invoiceNum}';

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
     * 获取发票开具iframe弹窗的地址
     * @param InvoiceOption $option
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getInvoiceIssuanceUrl(InvoiceOption $option)
    {
        return $this->client->request(self::INVOICE_ISSUANCE_URL, 'post', $option->toArray());
    }

    /**
     * 发票开具
     * @param InvoiceIssuanceOption $option
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function invoiceIssuance(InvoiceIssuanceOption $option)
    {
        return $this->client->request(self::INVOICE_ISSUANCE, 'post', $option->toArray());
    }

    /**
     * 获取商品类目
     * @param string $name
     * @param int $page
     * @param int $limit
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getCategory(string $name = '', int $page = 1, int $limit = 10)
    {
        return $this->client->request(self::INVOICE_CATEGORY, 'get', [
            'name' => $name,
            'page' => $page,
            'limit' => $limit
        ]);
    }

    /**
     * 获取用户使用过的类目
     * @param string $name
     * @param int $page
     * @param int $limit
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getCategoryUser(string $name = '', int $page = 1, int $limit = 10)
    {
        return $this->client->request(self::INVOICE_CATEGORY_USER, 'get', [
            'name' => $name,
            'page' => $page,
            'limit' => $limit
        ]);
    }

    /**
     * 查看发票详情
     * @param string $invoiceNum
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getInvoiceInfo(string $invoiceNum)
    {
        return $this->client->setPath('invoiceNum', $invoiceNum)->request(self::INVOICE_INFO, 'get');
    }

    /**
     * 开具负数发票
     * @param string $invoiceNum 发票号码
     * @param string $applyType
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function redInvoiceIssuance(string $invoiceNum, string $applyType)
    {
        return $this->client->setPath('invoiceNum', $invoiceNum)->request(self::INVOICE_ISSUANCE_RED, 'post', [
            'apply_type' => $applyType,
            'red_number' => '',
        ]);
    }

    /**
     * PDF 邮箱推送
     * @param string $taxId
     * @param string $invoiceNum
     * @param string $invoiceType
     * @param string $email
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function sendPdfEmail(string $taxId, string $invoiceNum, string $invoiceType = InvoiceEnum::INVOKE_TYPE_82, string $email = '')
    {
        return $this->client->request(self::SEND_PDF_EMAIL, 'post', [
            'tax_id' => $taxId,
            'invoice_num' => $invoiceNum,
            'invoice_type' => $invoiceType,
            'email' => $email
        ]);
    }

    /**
     * 下载发票
     * @param string $invoiceNum
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function downloadInvoice(string $invoiceNum)
    {
        $this->client->setPath('invoiceNum', $invoiceNum)->request(self::DOWNLOAD_INVOICE, 'get');
    }

}

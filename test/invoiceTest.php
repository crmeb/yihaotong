<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use Crmeb\Yihaotong\Option\GoodsOption;
use Crmeb\Yihaotong\Option\InvoiceIssuanceOption;
use PHPUnit\Framework\TestCase;

define('ACCESS_KEY', 'Aiok6xUdyOmpgXNd8Syf');
define('SECRET_KEY', 'fzAyZSjgoOgl3KYrM4zHBrKnXgc8imB9qLEC');

class invoiceTest extends TestCase
{

    /**
     * @var AccessToken
     */
    protected $accessToken;

    protected $factory;


    public function testgetCategory()
    {

        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->invoice()->getCategory();

        var_dump($res);
    }

    public function testCategoryUser()
    {

        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->invoice()->getCategoryUser();

        var_dump($res);
    }

    public function testgetInvoiceInfo()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->invoice()->getInvoiceInfo('23612000000028265987');

        var_dump($res);
    }

    public function testdownloadInvoice()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->invoice()->downloadInvoice('23612000000028265987');

        var_dump($res);
    }


    public function testinvoiceIssuance()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $option = new InvoiceIssuanceOption();
        $option->setDataToGoods([
            [
                'storeName' => '多商户',
                'unitPrice' => '10',
                'num' => '1',
                'cateId' => 10
            ]
        ]);
        $option->taxId = '';
        $option->bankName = '';

        $res = $this->factory->invoice()->invoiceIssuance($option);

        var_dump($res);
    }

}

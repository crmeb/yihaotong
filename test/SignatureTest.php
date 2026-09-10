<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use PHPUnit\Framework\TestCase;

define('ACCESS_KEY', 'IGQzNOzeSAr6Sx7tgw6C');
define('SECRET_KEY', 'EpCyUAvPfQwe1vC7eerFZxg8NcxxuLMKYcyE');

class SignatureTest extends TestCase
{
    protected function signature()
    {
        $accessToken = (new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]))->setBaseConfig((new \Crmeb\Yihaotong\Config())->setRedis([
            'host'       => '127.0.0.1',
            'port'       => '6379',
            'password'   => '',
            'expire'     => 0,
            'prefix'     => 'test',
            'tag_prefix' => '',
            'select'     => 0,
            'timeout'    => 0
        ])->setBaseUrl('https://test-api.crmeb.com/api/v2'));

        $factory = Factory::setAccessToken($accessToken);

        return $factory;
    }

    public function testdescribeTemplates()
    {
        $result = $this->signature()->signature()->getOperatorList(1, 10);

        var_dump($result);
    }

    public function testuploadFile()
    {
        $result = $this->signature()->signature()->uploadFile();
    }

    public function testgetSignFlowUrl()
    {
        $result= $this->signature()->signature()->getSignFlowUrl('111', '222','WEIXINAPP');
        var_dump($result);
    }
}
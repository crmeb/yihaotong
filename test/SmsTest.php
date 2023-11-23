<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use PHPUnit\Framework\TestCase;

define('ACCESS_KEY', '');
define('SECRET_KEY', '');

class SmsTest extends TestCase
{

    public function testGetToken()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $token = $this->accessToken->accessToken();
        var_dump($token);
    }

    public function testsend()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->sms()->send('15594500000', '980197', ['title' => '加菲猫']);

        var_dump($res);
    }

    public function testsmsRecord()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->sms()->smsRecord();

        var_dump($res);
    }

    public function testtemps()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->sms()->temps();

        var_dump($res);
    }
}

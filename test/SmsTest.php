<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use PHPUnit\Framework\TestCase;

define('ACCESS_KEY', 'Aiok6xUdyOmpgXNd8Syf');
define('SECRET_KEY', 'fzAyZSjgoOgl3KYrM4zHBrKnXgc8imB9qLEC');

class SmsTest extends TestCase
{

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

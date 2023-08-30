<?php

use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use Crmeb\Yihaotong\Option\CreateOrderOption;
use PHPUnit\Framework\TestCase;


define('ACCESS_KEY', 'Aiok6xUdyOmpgXNd8Syf');
define('SECRET_KEY', 'fzAyZSjgoOgl3KYrM4zHBrKnXgc8imB9qLEC');

class ShipmentTest extends TestCase
{

    public function testcreateOrder()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $option = new CreateOrderOption();
        $option->kuaidicom = 'jd';
        $option->manName = '张你哈';
        $option->phone = '15594500000';
        $option->address = '陕西省西安市';
        $option->sendAddress = '陕西省安康市';
        $option->sendRealName = '张三丰';
        $option->sendPhone = '15594500001';

        $res = $this->factory->shipment()->createOrder($option);

        var_dump($res);
    }

    public function testqueryPrice()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->shipment()->queryPrice('jd', '陕西省西安市莲湖区汉城路', '陕西省安康市旬阳县');

        var_dump($res);
    }

    public function testgetKuaidiComs()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->shipment()->getKuaidiComs();

        var_dump($res);
    }

    public function testcancelOrder()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->shipment()->cancelOrder('F89B1A1E887B0E495DC3CA0116179E17', '78001354', '不寄件了');

        var_dump($res);
    }
}

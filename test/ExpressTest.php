<?php


use Crmeb\Yihaotong\AccessToken;
use Crmeb\Yihaotong\Factory;
use PHPUnit\Framework\TestCase;

define('ACCESS_KEY', 'Aiok6xUdyOmpgXNd8Syf');
define('SECRET_KEY', 'fzAyZSjgoOgl3KYrM4zHBrKnXgc8imB9qLEC');

class ExpressTest extends TestCase
{

    public function testtemp()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->express()->temp('yunda');

        var_dump($res);
    }

    public function testexpress()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->express()->express();

        var_dump($res);
    }

    public function testquery()
    {
        $this->accessToken = new AccessToken([
            'access_key' => ACCESS_KEY,
            'secret_key' => SECRET_KEY,
        ]);

        $this->factory = Factory::setAccessToken($this->accessToken);

        $res = $this->factory->express()->query('433407146126554');

        var_dump($res);
    }

    public function testdump()
    {

    }
}

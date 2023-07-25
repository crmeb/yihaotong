<?php

namespace Crmeb\Yihaotong;

use Crmeb\Yihaotong\Application\AuthClient;
use Crmeb\Yihaotong\Application\CollectClient;
use Crmeb\Yihaotong\Application\ExpressClient;
use Crmeb\Yihaotong\Application\SmsClient;
use Crmeb\Yihaotong\Util\Str;

/**
 * 容器入口
 * Class Factory
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong
 * @method static AuthClient auth($accessToken)
 * @method static CollectClient collet($accessToken)
 * @method static ExpressClient express($accessToken)
 * @method static SmsClient sms($accessToken)
 */
class Factory
{

    /**
     * @var array
     */
    protected static $drivers = [];

    /**
     * @var AccessToken
     */
    protected static $accessToken;

    /**
     * @param AccessToken $accessToken
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/7/25
     */
    public static function setAccessToken(AccessToken $accessToken)
    {
        self::$accessToken = $accessToken;
    }

    /**
     * @param string $name
     * @param array $config
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public static function make(string $name, array $config)
    {
        $namespace = Str::studly($name);

        if (empty(self::$drivers[$namespace])) {

            $application = "\\Crmeb\\Yihaotong\\Application\\{$namespace}Client";

            self::$drivers[$namespace] = new $application(...$config);
        }

        return self::$drivers[$namespace];
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, self::$accessToken ? [self::$accessToken] : $arguments);
    }
}

<?php

namespace Crmeb\Yihaotong;


use GuzzleHttp\Client;

/**
 * Class BaseClient
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong
 */
class BaseClient
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * 配置
     * @var array
     */
    protected $config = [];

    /**
     * @var bool
     */
    protected $verify = false;

    /**
     * BaseClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client(['verify' => $this->verify, 'timeout' => 10]);
        $this->initConfig();
    }

    /**
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public function initConfig()
    {
        $config = require_once __DIR__ . '/config.php';

        $this->config = $config;
    }

    /**
     * @param string|null $uri
     * @return string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public function baseUrl(string $uri = null)
    {
        return $this->config['base_url'] . ($uri ? '/' . $uri : '');
    }


}

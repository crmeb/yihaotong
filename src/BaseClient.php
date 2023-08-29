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
     * uri参数
     * @var array
     */
    protected $path = [];

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

    /**
     * 设置path路径参数
     * @param string $key
     * @param $value
     * @return $this
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function setPath(string $key, $value)
    {
        $this->path[$key] = $value;
        return $this;
    }

    /**
     * 替换url
     * @param string $uri
     * @return array|string|string[]
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function replaceUrl(string $uri)
    {
        if (!$this->path) {
            return $uri;
        }

        $var = [];
        $replace = [];

        foreach ($this->path as $key => $item) {
            $var[] = '{' . $key . '}';
            $replace[] = $item;
        }

        return str_replace($var, $replace, $uri);
    }


}

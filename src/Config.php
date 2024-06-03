<?php

namespace Crmeb\Yihaotong;

/**
 *
 */
class Config
{

    /**
     * 请求地址
     * @var string
     */
    protected $baseUrl = 'https://sms.crmeb.net/api/v2';

    /**
     *
     * 缓存前缀
     * @var string
     */
    protected $baseCachePrefix = 'sms-crmeb-yihaotong-';

    /**
     * 缓存超时时间
     * @var int
     */
    protected $baseCacheTimeout = 300;


    /**
     * 缓存过期时间
     * @var int
     */
    protected $expires = 3600;

    /**
     * redis 配置
     * @var array
     */
    protected $redis = [
        'host' => '127.0.0.1',
        'port' => '6379',
        'password' => '',
        'expire' => 0,
        'prefix' => '',
        'tag_prefix' => '',
        'select' => 0,
        'timeout' => 0
    ];

    /**
     * 设置基础请求地址
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * 设置缓存前缀
     * @param string $baseCachePrefix
     * @return $this
     */
    public function setBaseCachePrefix(string $baseCachePrefix)
    {
        $this->baseCachePrefix = $baseCachePrefix;
        return $this;
    }

    /**
     * 设置缓存超时时间
     * @param int $baseCacheTimeout
     * @return $this
     */
    public function setBaseCacheTimeout(int $baseCacheTimeout)
    {
        $this->baseCacheTimeout = $baseCacheTimeout;
        return $this;
    }

    /**
     * 设置过期时间
     * @param int $expires
     * @return $this
     */
    public function setExpires(int $expires)
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * 设置redis 配置
     * @param array $redis
     * @return $this
     */
    public function setRedis(array $redis)
    {
        $this->redis = $redis;
        return $this;
    }

    /**
     * 转数组
     * @return array
     */
    public function toArray()
    {
        return [
            'base_url' => $this->baseUrl,
            'base_cache_prefix' => $this->baseCachePrefix,
            'base_cache_timeout' => $this->baseCacheTimeout,
            'expires' => $this->expires,
            'redis' => $this->redis,
        ];
    }
}


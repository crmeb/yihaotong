<?php

namespace Crmeb\Yihaotong;

/**
 *
 */
class Config
{

    protected $baseUrl = 'https://sms.crmeb.net/api/v2';

    protected $baseCachePrefix = 'sms-crmeb-yihaotong-';

    protected $baseCacheTimeout = 300;

    protected $expires = 3600;

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

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function setBaseCachePrefix(string $baseCachePrefix)
    {
        $this->baseCachePrefix = $baseCachePrefix;
        return $this;
    }

    public function setBaseCacheTimeout(int $baseCacheTimeout)
    {
        $this->baseCacheTimeout = $baseCacheTimeout;
        return $this;
    }

    public function setExpires(int $expires)
    {
        $this->expires = $expires;
        return $this;
    }

    public function setRedis(array $redis)
    {
        $this->redis = $redis;
        return $this;
    }

    /**
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


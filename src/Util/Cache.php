<?php
/**
 *  +----------------------------------------------------------------------
 *  | CRMEB [ CRMEB赋能开发者，助力企业发展 ]
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2016~2022 https://www.crmeb.com All rights reserved.
 *  +----------------------------------------------------------------------
 *  | Licensed CRMEB并不是自由软件，未经许可不能去掉CRMEB相关版权
 *  +----------------------------------------------------------------------
 *  | Author: CRMEB Team <admin@crmeb.com>
 *  +----------------------------------------------------------------------
 */

namespace Crmeb\Yihaotong\Util;


use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Psr\SimpleCache\CacheInterface;

/**
 * Class Cache
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/13
 * @package Crmeb\Yihaotong\Util
 */
class Cache implements CacheInterface
{

    /**
     * @var \Redis
     */
    protected $redis;

    /**
     * @var array
     */
    protected $config;

    /**
     * Cache constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        try {
            $this->redis = new \Redis;

            $this->redis->connect($config['host'], (int)$config['port'], (int)$config['timeout']);

            if (!empty($config['password'])) {
                $this->redis->auth($config['password']);
            }

            if (isset($this->config['select']) && 0 != $this->config['select']) {
                $this->redis->select($this->config['select']);
            }

        } catch (\Throwable $e) {
            throw new YiHaoTongException($e->getMessage());
        }
    }

    /**
     * 序列化数据
     * @access protected
     * @param mixed $data 缓存数据
     * @return string
     */
    protected function serialize($data): string
    {
        if (is_numeric($data)) {
            return (string)$data;
        }

        $serialize = $this->config['redis']['serialize'][0] ?? "serialize";

        return $serialize($data);
    }

    /**
     * 反序列化数据
     * @access protected
     * @param string $data 缓存数据
     * @return mixed
     */
    protected function unserialize(string $data)
    {
        if (is_numeric($data)) {
            return $data;
        }

        $unserialize = $this->config['redis']['serialize'][1] ?? "unserialize";

        return $unserialize($data);
    }

    /**
     * @param string $key
     * @param null $default
     * @return int|mixed|string|null
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function get($key, $default = null)
    {
        $key = $this->getCacheKey($key);
        $value = $this->unserialize($this->redis->get($key));

        return $value !== null ? $value : $default;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param null $ttl
     * @return bool
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function set($key, $value, $ttl = null)
    {
        $key = $this->getCacheKey($key);
        $value = $this->serialize($value);

        return $this->redis->set($key, $value, $ttl);
    }

    /**
     * 删除单个
     * @param string $key
     * @return bool|int
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function delete($key)
    {
        return $this->redis->del($this->getCacheKey($key));
    }

    /**
     * 清除全部
     * @return bool
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function clear()
    {
        $this->redis->flushDB();
        return true;
    }

    /**
     * @param iterable $keys
     * @param null $default
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function getMultiple($keys, $default = null)
    {
        $result = [];

        foreach ($keys as $key) {
            $result[$key] = $this->get($key, $default);
        }

        return $result;
    }

    /**
     * @param iterable $values
     * @param null $ttl
     * @return bool
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function setMultiple($values, $ttl = null)
    {
        foreach ($values as $key => $val) {
            $result = $this->set($key, $val, $ttl);

            if (false === $result) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param iterable $keys
     * @return bool
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function deleteMultiple($keys)
    {
        foreach ($keys as $key) {
            $result = $this->delete($key);

            if (false === $result) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $key
     * @return bool|int
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function has($key)
    {
        return $this->redis->exists($this->getCacheKey($key));
    }

    /**
     * @param string $key
     * @return string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    protected function getCacheKey(string $key)
    {
        return $this->config['redis']['prefix'] . $key;
    }

    /**
     * @param $method
     * @param $args
     * @return false|mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->redis, $method], $args);
    }
}

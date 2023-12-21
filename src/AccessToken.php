<?php

namespace Crmeb\Yihaotong;

use Crmeb\Yihaotong\Util\Cache;
use Crmeb\Yihaotong\Util\Str;
use GuzzleHttp\Exception\GuzzleException;
use Psr\SimpleCache\CacheInterface;
use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * 获取token
 * Class AccessToken
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong\Application
 */
class AccessToken extends BaseClient
{

    const USER_LOGIN = "/user/login";

    /**
     * @var string
     */
    protected $accessKey;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var int
     */
    protected $limit = 20;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * AccessToken constructor.
     * @param array $config
     * @param CacheInterface|null $cache
     */
    public function __construct(array $config = [], CacheInterface $cache = null)
    {
        parent::__construct();
        $this->accessKey = $config['access_key'] ?? '';
        $this->secretKey = $config['secret_key'] ?? '';
        $this->limit = $config['limit'] ?? 20;
        $this->cache = $cache ?: new Cache($this->config['redis'] ?? []);
    }

    /**
     * 获取缓存
     * @return Cache|CacheInterface
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * 设置缓存
     * @param CacheInterface $cache
     * @return $this
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/11/22
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * 设置
     * @param string $accessKey
     * @param string $secretKey
     * @return $this
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function setConfig(string $accessKey, string $secretKey)
    {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        return $this;
    }

    /**
     * 获取accessKey
     * @return mixed|string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * 获取secretKey
     * @return mixed|string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * 从缓存中获取token
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public function accessToken()
    {
        $key = md5($this->config['base_cache_prefix'] . $this->accessKey . $this->secretKey);
        if ($this->cache->has($key)) {
            $accessToken = $this->cache->get($key);
        } else {
            $token = $this->getToken();
            $accessToken = $token['access_token'];
            $this->cache->set($key, $token['access_token'], $token['expires_in'] ?? $this->config['expires'] ?? 3600);
        }

        return $accessToken;
    }

    /**
     * 删除token
     * @return bool
     * @throws InvalidArgumentException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public function removeToken()
    {
        $key = md5($this->config['base_cache_prefix'] . $this->accessKey . $this->secretKey);

        return $this->cache->delete($key);
    }

    /**
     * @param int $limit
     * @return int
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public function checkLimit(int $limit)
    {
        if ($limit > $this->limit) {
            throw new YiHaoTongException('截取长度超出系统限制，系统限制为：' . $this->limit);
        }
        return $limit;
    }

    /**
     * 获取token
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    protected function getToken()
    {
        $params = [
            'access_key' => $this->accessKey,
            'secret_key' => $this->secretKey,
        ];
        if (!$this->accessKey || !$this->secretKey) {
            throw new YiHaoTongException('缺少获取token参数!');
        }
        $response = $this->client->post($this->baseUrl(self::USER_LOGIN), ['json' => $params]);
        $response = json_decode($response->getBody()->getContents(), true);
        if (!$response) {
            throw new YiHaoTongException('获取token失败');
        }
        if ($response['status'] === 200) {
            return $response['data'];
        } else {
            throw new YiHaoTongException($response['msg']);
        }
    }

    /**
     * 请求
     * @param string $uri
     * @param string $method
     * @param array $options
     * @param array $header
     * @param bool $auth
     * @return mixed
     * @throws GuzzleException|InvalidArgumentException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public function request(string $uri, string $method, array $options = [], array $header = [], bool $auth = true)
    {
        if ($auth) {
            $header = array_merge($header, [
                'Authorization' => 'Bearer-' . $this->accessToken()
            ]);
        }

        if (!empty($options['phone']) && !Str::checkPhone($options['phone'])) {
            throw new YiHaoTongException('手机号格式错误');
        }

        $response = $this->client->request($method, $this->replaceUrl($this->baseUrl($uri)), [
            'headers' => $header,
            'json' => $options,
        ]);

        if ($response->getStatusCode() != 200) {
            throw new YiHaoTongException('请求失败，HTTP状态码为：' . $response->getStatusCode());
        }

        $body = $response->getBody();

        return json_decode($body->getContents(), true);
    }
}

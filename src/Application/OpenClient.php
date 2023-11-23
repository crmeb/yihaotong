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

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class OpenClient
{

    const PARTICIPLE_URI = '/open/keyword';

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * OpenClient constructor.
     * @param AccessToken $client
     */
    public function __construct(AccessToken $client)
    {
        $this->client = $client;
    }

    /**
     * 分词
     * @param string $keyword
     * @return ResponseInterface
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/11/23
     */
    public function participle(string $keyword)
    {
        return $this->requestIO(self::PARTICIPLE_URI, 'get', ['keyword' => $keyword]);
    }


    /**
     * 开发接口请求
     * @param string $uri
     * @param string $method
     * @param array $options
     * @param array $header
     * @return mixed
     * @throws GuzzleException
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/11/23
     */
    protected function requestIO(string $uri, string $method, array $options = [], array $header = [])
    {
        return $this->client->request($uri, $method, $options, $header, false);
    }

}

<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;

/**
 * Ai模型
 */
class AiClient
{

    const AI_CONVERSATION = '/chat/conversation';

    // 创建/获取API Key
    const AI_API_KEY = '/chat/apikey';
    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * SmsClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }

    /**
     * 模型对话
     * @param string $message
     * @param bool $stream
     * @param array $assistantMessage
     * @return mixed
     */
    public function conversation(string $message, bool $stream = false, array $assistantMessage = [])
    {
        return $this->client->request(self::AI_CONVERSATION, 'post', [
            'message'           => $message,
            'stream'            => $stream ? 1 : 0,
            'assistant_message' => $assistantMessage
        ]);
    }

    /**
     * 创建或获取API Key
     * 已有API Key时后端直接复用创建时间最早的一把(reused=true),不再重复创建
     * @param string $name Key名称,可空
     * @param int $days 有效期天数,0=永久有效;最大3650天
     * @return mixed data: {id, key, group, reused}
     */
    public function createApiKey(string $name = '', int $days = 0)
    {
        return $this->client->request(self::AI_API_KEY, 'post', [
            'name' => $name,
            'days' => $days,
        ]);
    }
}
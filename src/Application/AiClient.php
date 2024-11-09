<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;

/**
 * Ai模型
 */
class AiClient
{

    const AI_CONVERSATION = '/chat/conversation';
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
}
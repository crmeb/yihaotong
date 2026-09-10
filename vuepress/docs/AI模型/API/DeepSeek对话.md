# DeepSeek对话

调用DeepSeek对话接口进行深度推理对话，兼容OpenAI消息格式，支持流式（SSE）与非流式返回；按实际消耗的tokens扣除套餐余量

### 请求语法

```
POST v2/chat/deepseek
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Authorization | 字符串|是|--| 授权TOKEN |

### 请求参数

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| messages | 数组|是|[{"role":"user","content":"你好"}]| OpenAI风格消息数组，role支持system/user/assistant |
| max_tokens | 数字|否|2048| 最大生成tokens，不传使用默认值 |
| temperature | 数字|否|0.2| 采样温度，不传使用默认值 |
| frequency_penalty | 数字|否|0| 频率惩罚 |
| stream | 布尔|否|false| true=以SSE流式返回 |
| response_format | 对象|{}| {"type":"json_object"} | 指定返回JSON格式 |

### 响应元素

非流式时返回：

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data.code | 数字|200| 200=请求成功 |
| data.data | 对象|--| DeepSeek原始返回，含choices（choices[].message.content为回复内容）与usage（tokens消耗） |
| status | 数字|200| 请求状态；200=请求成功；400=请求失败 |
| msg | 字符串|ok| 请求文字描述 |

流式（stream=true）时以 `text/event-stream` 返回，格式为SSE：每行 `data: {...}` 为一段增量内容，请按流式协议逐段读取拼接

> 调用前需已开通AI会话服务且未欠费；按流式或非流式的总tokens扣减套餐余量

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/chat/deepseek',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'messages' => [
            [
                'role' => 'user',
                'content' => '你好',
            ],
        ],
        'max_tokens' => 2048,
        'temperature' => 0.2,
        'frequency_penalty' => 0,
        'stream' => false,
        'response_format' => [
            'type' => 'json_object',
        ],
    ]),
]);

$response = curl_exec($ch);
curl_close($ch);

var_dump(json_decode($response, true));
```

</code-block>
<code-block title="Java">

```java
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;

String token = "your access_token";

HttpRequest request = HttpRequest.newBuilder()
        .uri(URI.create("http://sms.crmeb.net/api/v2/chat/deepseek"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"messages\":[{\"role\":\"user\",\"content\":\"你好\"}],\"max_tokens\":2048,\"temperature\":0.2,\"frequency_penalty\":0,\"stream\":false,\"response_format\":{\"type\":\"json_object\"}}"))
        .build();

HttpResponse<String> response = HttpClient.newHttpClient()
        .send(request, HttpResponse.BodyHandlers.ofString());
System.out.println(response.body());
```

</code-block>
<code-block title="Node">

```javascript
const token = 'your access_token';

(async () => {
    const response = await fetch('http://sms.crmeb.net/api/v2/chat/deepseek', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'messages': [
                {
                    'role': "user",
                    'content': "你好",
                },
            ],
            'max_tokens': 2048,
            'temperature': 0.2,
            'frequency_penalty': 0,
            'stream': false,
            'response_format': {
                'type': "json_object",
            },
        })
    });

    const data = await response.json();
    console.log(data);
})();
```

</code-block>
<code-block title="Go">

```go
package main

import (
	"fmt"
	"io"
	"net/http"
	"strings"
)

func main() {
	token := "your access_token"

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/chat/deepseek", strings.NewReader(`{"messages":[{"role":"user","content":"你好"}],"max_tokens":2048,"temperature":0.2,"frequency_penalty":0,"stream":false,"response_format":{"type":"json_object"}}`))
	req.Header.Set("Authorization", "Bearer-"+token)
	req.Header.Set("Content-Type", "application/json")

	resp, err := http.DefaultClient.Do(req)
	if err != nil {
		panic(err)
	}
	defer resp.Body.Close()

	result, _ := io.ReadAll(resp.Body)
	fmt.Println(string(result))
}
```

</code-block>
</code-group>

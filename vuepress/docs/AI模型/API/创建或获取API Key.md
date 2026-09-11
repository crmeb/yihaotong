# 创建或获取API Key

调用创建或获取API Key接口获取AI接口的鉴权Key，用于在Codex、ZCode、Claude Code等AI工具中配置接口密钥；已有API Key时后端直接复用创建时间最早的一把，不会重复创建

### 请求语法

```
POST v2/chat/apikey
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Authorization | 字符串|是|--| 授权TOKEN |

### 请求参数

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| name | 字符串|否|我的AI应用| API Key名称 |
| days | 数字|否|30| 有效期天数；0=永久有效；最大3650天 |

### 响应元素

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data | 对象|--| 返回数据，详细[查看data响应](#data) |
| status | 数字|200| 请求状态；200=请求成功；400=请求失败 |
| msg | 字符串|success| 请求文字描述 |

### <a id='data'>data响应</a>

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| id | 数字|1| API Key记录ID |
| key | 字符串|sk-xxxxxxxx| 明文API Key，以sk-开头；仅返回一次，请妥善保存 |
| group | 字符串|默认分组| 所属分组名称 |
| reused | 布尔|false| 是否复用已有Key；true=返回已存在的Key；false=本次新建 |

> 获取到的 key 配合接口地址 `https://ai.crmeb.com/v1` 使用，配置方式请查看[AI接口配置](/docs/AI模型/AI接口配置.html)

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/chat/apikey',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'name' => '我的AI应用',
        'days' => 30,
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
        .uri(URI.create("http://sms.crmeb.net/api/v2/chat/apikey"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"name\":\"我的AI应用\",\"days\":30}"))
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
    const response = await fetch('http://sms.crmeb.net/api/v2/chat/apikey', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'name': "我的AI应用",
            'days': 30,
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

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/chat/apikey", strings.NewReader(`{"name":"我的AI应用","days":30}`))
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

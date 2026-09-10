# 开通AI会话服务

调用开通AI会话服务接口为当前用户开通AI会话服务，开通后才能调用对话、向量转换等会话类接口

### 请求语法

```
POST v2/chat/open
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Authorization | 字符串|是|--| 授权TOKEN |

### 请求参数

无

### 响应元素

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data | 数组|[]| 无返回数据 |
| status | 数字|200| 请求状态；200=请求成功；400=请求失败 |
| msg | 字符串|开通成功| 请求文字描述；已开通时返回「服务已开通，请勿重复操作！」 |

> 开通后需要购买套餐获得tokens余量；对话、向量转换、DeepSeek等接口调用前会校验服务状态，欠费或被关闭时无法调用

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/chat/open',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'data' => [],
        'status' => 1,
        'msg' => '请求文字描述；已开通时返回「服务已开通，请勿重复操作！」',
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
        .uri(URI.create("http://sms.crmeb.net/api/v2/chat/open"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"data\":[],\"status\":1,\"msg\":\"请求文字描述；已开通时返回「服务已开通，请勿重复操作！」\"}"))
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
    const response = await fetch('http://sms.crmeb.net/api/v2/chat/open', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'data': [],
            'status': 1,
            'msg': "请求文字描述；已开通时返回「服务已开通，请勿重复操作！」",
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

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/chat/open", strings.NewReader(`{"data":[],"status":1,"msg":"请求文字描述；已开通时返回「服务已开通，请勿重复操作！」"}`))
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

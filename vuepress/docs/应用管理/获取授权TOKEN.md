# 获取授权TOKEN

调用获取授权token前必须先获取到AccessKey和SecretKey；并且AccessKey的状态必须开启否则无法使用；本接口无需授权

### 请求语法

```
POST v2/user/login
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Content-Type | 字符串|是|application/json| 默认值：application/json |

### 请求参数

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| access_key | 字符串|是|BZKoP4UxZW55FkhXwvQp| access_key一号通后台应用管理获得APPID |
| secret_key | 字符串|是|oJX0a0ZquyohszxGeaUqwqQX16a4vRz3AonA| secret_key一号通后台应用管理获得AppSecret |

### 响应元素

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data | 对象|--| 返回数据，详细查看data响应 |
| status | 数字|200| 请求状态；200=请求成功；400=请求失败 |
| msg | 字符串|success| 请求文字描述 |

### data响应

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| access_token | 字符串|--| 鉴权token |
| expires_in | 数字|--| token有效期 |

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/user/login',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'access_key' => 'BZKoP4UxZW55FkhXwvQp',
        'secret_key' => 'oJX0a0ZquyohszxGeaUqwqQX16a4vRz3AonA',
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
        .uri(URI.create("http://sms.crmeb.net/api/v2/user/login"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"access_key\":\"BZKoP4UxZW55FkhXwvQp\",\"secret_key\":\"oJX0a0ZquyohszxGeaUqwqQX16a4vRz3AonA\"}"))
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
    const response = await fetch('http://sms.crmeb.net/api/v2/user/login', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'access_key': "BZKoP4UxZW55FkhXwvQp",
            'secret_key': "oJX0a0ZquyohszxGeaUqwqQX16a4vRz3AonA",
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

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/user/login", strings.NewReader(`{"access_key":"BZKoP4UxZW55FkhXwvQp","secret_key":"oJX0a0ZquyohszxGeaUqwqQX16a4vRz3AonA"}`))
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

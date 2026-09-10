# PDF邮箱推送

调用PDF邮箱推送接口，PDF格式发票会以邮件的形式发送到邮箱内

### 请求语法

```
POST v2/invoice/send_pdf_email
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Authorization | 字符串|是|--| 授权TOKEN |

### 请求参数

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| tax_id | 字符串|是|--| 纳税人识别号 |
| invoice_num | 字符串|是|--| 发票号码 |
| invoice_type | 字符串|是|--| 发票类型代码 |
| email | 字符串|否|--| 邮箱地址，不填则默认取开具的发票中填写的购方邮箱进行推送。 |

### 响应元素

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data | 对象|{}| 返回空|
| status | 数字|200| 请求状态；200=请求成功；400=请求失败； |
| msg | 字符串|success| 请求文字描述 |

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/invoice/send_pdf_email',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'tax_id' => 'xxx',
        'invoice_num' => 'xxx',
        'invoice_type' => 'xxx',
        'email' => 'xxx',
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
        .uri(URI.create("http://sms.crmeb.net/api/v2/invoice/send_pdf_email"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"tax_id\":\"xxx\",\"invoice_num\":\"xxx\",\"invoice_type\":\"xxx\",\"email\":\"xxx\"}"))
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
    const response = await fetch('http://sms.crmeb.net/api/v2/invoice/send_pdf_email', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'tax_id': "xxx",
            'invoice_num': "xxx",
            'invoice_type': "xxx",
            'email': "xxx",
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

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/invoice/send_pdf_email", strings.NewReader(`{"tax_id":"xxx","invoice_num":"xxx","invoice_type":"xxx","email":"xxx"}`))
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

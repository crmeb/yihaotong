# 自然语言转SQL

调用自然语言转SQL接口，将用户问题与数据表结构描述转换为可直接执行的MySQL查询SQL；系统会自动附加约束提示词，仅生成SELECT查询，非聚合SQL使用分页占位符

### 请求语法

```
POST v2/chat/nl_to_sql
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Authorization | 字符串|是|--| 授权TOKEN |

### 请求参数

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| messages | 数组|是|见下方说明| 消息数组：把用户问题和表结构描述（表名、字段名及中文含义）放入 role=user 的 content 中 |
| max_tokens | 数字|否|2048| 最大生成tokens |

messages 中 content 的推荐组织方式：先描述表结构（如 `eb_user表: uid=用户编号, nickname=用户昵称, pay_count=消费金额`），再描述需要查询的问题（如 `查询消费金额最高的10个用户`）

### 响应元素

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| data.code | 数字|200| 200=请求成功 |
| data.data.choices | 数组|[]| 结果数组，choices[0].message.content为SQL结果JSON字符串 |
| status | 数字|200| 请求状态；200=请求成功；400=请求失败 |
| msg | 字符串|ok| 请求文字描述 |

### content内容解析（JSON字符串）

| 名称 | 类型 |示例值| 描述|
|---|---|---|---| 
| list_sql | 字符串|SELECT ... FROM ... WHERE ... LIMIT ${page},${limit}| 列表查询SQL；非聚合SQL包含 ${page}、${limit} 占位符，执行前请替换为实际页码与条数 |
| page_sql | 字符串|SELECT COUNT(*) AS count_nums FROM ...| 总条数统计SQL，用于分页 |
| table_fields | 对象|{"uid":"用户编号"}| 返回字段与中文含义的映射 |

> 仅生成SELECT查询语句；聚合SQL（如COUNT/SUM）不包含分页占位符，直接执行即可；按本次消耗tokens扣减套餐余量

### 请求示例

<code-group>
<code-block title="PHP" active>

```php
<?php

$token = 'your access_token';

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'http://sms.crmeb.net/api/v2/chat/nl_to_sql',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer-' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
        'messages' => [],
        'max_tokens' => 2048,
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
        .uri(URI.create("http://sms.crmeb.net/api/v2/chat/nl_to_sql"))
        .header("Authorization", "Bearer-" + token)
        .header("Content-Type", "application/json")
        .POST(HttpRequest.BodyPublishers.ofString("{\"messages\":[],\"max_tokens\":2048}"))
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
    const response = await fetch('http://sms.crmeb.net/api/v2/chat/nl_to_sql', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer-' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'messages': [],
            'max_tokens': 2048,
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

	req, _ := http.NewRequest("POST", "http://sms.crmeb.net/api/v2/chat/nl_to_sql", strings.NewReader(`{"messages":[],"max_tokens":2048}`))
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

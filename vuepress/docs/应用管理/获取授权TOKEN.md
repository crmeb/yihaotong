# 获取授权TOKEN

调用获取授权token前必须先获取到AccessKey和SecretKey；并且AccessKey的状态必须开启否则无法使用；本接口无需授权

### 请求语法

```
POST v2/user/login
```

### 请求头

| 名称 | 类型|是否必填 |示例值| 描述|
|---|---|---|---|---|
| Content-Type | 字符串|是|multipart/form-data| 默认值：multipart/form-data |

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


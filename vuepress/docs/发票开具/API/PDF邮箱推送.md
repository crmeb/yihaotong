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
| Content-Type | 字符串|是|application/json;charset=UTF-8| 默认值：application/json;charset=UTF-8 |

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


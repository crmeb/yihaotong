# API概况

本文主要介绍一号通提供的相关接口API接口以及API接口的使用方法

### 公共请求头

| 名称 | 是否必填 | 描述|
|---|---|---|
| Authorization |是| 鉴权token，格式为：Bearer-{$token} ;其中的{$token}需要更换为鉴权token|
| Content-Type | 是| 默认值：application/json;charset=UTF-8 |

### 关于短信服务API

| API | 描述 |
|---|---|
| v2/sms_v2/send | 发送验证短信、营销短信、通知短信接口 |
| v2/sms_v2/temps | 获取当前账号下可用或者申请中的短信模板 |
| v2/sms_v2/record | 获取当前账号下短信发送记录 |

### 关于商家寄件服务API

| API | 描述 |
|---|---|
| v2/shipment/create_order | 创建商家寄件订单 |
| v2/shipment/cancel_order | 取消商家寄件订单 |
| v2/shipment/index | 获取商家寄件下单订单列表 |
| call_back_url | 回调接口，寄件订单发生改变推送接口 |

### 关于面单打印服务API

| API | 描述 |
|---|---|
| v2/expr/dump | 电子面单打印接口 |
| v2/expr/express | 获取电子面单打印支持物流公司接口，配合打印电子面单使用，某些快递公司需要额外参数 |
| v2/expr/temp | 电子面单打印模板 |
| v2/expr/record | 电子面单打印记录 |

### 关于物流查询API

| API | 描述 |
|---|---|
| v2/expr/query | 查询物流接口 |
| v2/expr/record | 物流接口查询记录接口 |

### 关于商品采集API

| API | 描述 |
|---|---|
| v2/copy/goods | 采集商品接口 |
| v2/copy/record | 采集商品记录接口 |

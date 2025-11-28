# API概况

本文主要介绍一号通提供的相关接口API接口以及API接口的使用方法

### 公共请求头

| 名称 | 是否必填 | 描述                                                   |
|---|---|------------------------------------------------------|
| Authorization |是| 鉴权token，格式为：Bearer-{$token} ;其中的{$token}需要更换为鉴权token |
| Content-Type | 是| 默认值：multipart/form-data; 或者: application/json        |

### API列表

| 服务分类   | API接口                                       | 描述                                                                                |
|--------|---------------------------------------------|-----------------------------------------------------------------------------------|
| 短信服务   | `v2/sms_v2/send`                            | <a href='/docs/短信服务/API/发送短信.html'>发送验证短信、营销短信、通知短信接口</a>                         |
| 短信服务   | `v2/sms_v2/temps`                           | <a href='/docs/短信服务/API/获取短信模板.html'>获取当前账号下可用或者申请中的短信模板</a>                      |
| 短信服务   | `v2/sms_v2/record`                          | <a href='/docs/短信服务/API/发送记录.html'>获取当前账号下短信发送记录</a>                              |
| 商家寄件服务 | `v2/shipment/create_order`                  | <a href='/docs/商家寄件/API/创建商家寄件订单.html'>创建商家寄件订单</a>                               |
| 商家寄件服务 | `v2/shipment/cancel_order`                  | <a href='/docs/商家寄件/API/取消寄件.html'>取消商家寄件订单</a>                                   |
| 商家寄件服务 | `v2/shipment/index`                         | <a href='/docs/商家寄件/API/寄件订单列表.html'>获取商家寄件下单订单列表</a>                             |
| 商家寄件服务 | `call_back_url`                             | <a href='/docs/商家寄件/API/订单回调.html'>回调接口，寄件订单发生改变推送接口</a>                          |
| 面单打印服务 | `v2/expr/dump`                              | <a href='/docs/面单打印/API/打印电子面单.html'>电子面单打印接口</a>                                 |
| 面单打印服务 | `v2/expr/express`                           | <a href='/docs/面单打印/API/获取物流列表.html'>获取电子面单打印支持物流公司接口，配合打印电子面单使用，某些快递公司需要额外参数</a> |
| 面单打印服务 | `v2/expr/temp`                              | <a href='/docs/面单打印/API/获取面单模板列表.html'>电子面单打印模板</a>                               |
| 面单打印服务 | `v2/expr/repeat_dump`                       | <a href='/docs/面单打印/API/电子面单复打.html'>电子面单复打</a>                                   |
| 面单打印服务 | `v2/expr/record`                            | <a href='/docs/面单打印/API/电子面单打印记录.html'>电子面单打印记录</a>                               |
| 物流查询   | `v2/expr/query`                             | <a href='/docs/物流查询/API/查询物流.html'>查询物流接口</a>                                     |
| 物流查询   | `v2/expr/record`                            | <a href='/docs/物流查询/API/物流接口查询记录接口.html'>物流接口查询记录接口</a>                           |
| 商品采集   | `v2/copy/goods`                             | <a href='/docs/商品采集/API/采集商品接口.html'>采集商品接口</a>                                   |
| 商品采集   | `v2/copy/record`                            | <a href='/docs/商品采集/API/查询记录.html'>采集商品记录接口</a>                               |
| 发票开具   | `v2/invoice/invoice_issuance_url`           | <a href='/docs/发票开具/API/获取发票开具iframe地址.html'>获取发票开具页面iframe地址</a>                          |
| 发票开具   | `v2/invoice/invoice_issuance`               | <a href='/docs/发票开具/API/发票开具.html'>发票开具接口</a>                                     |
| 发票开具   | `v2/invoice/category`                       | <a href='/docs/发票开具/API/获取商品类目.html'>获取商品类目接口</a>                                   |
| 发票开具   | `v2/invoice/invoice_info/:invoiceNum`       | <a href='/docs/发票开具/API/查看发票详情.html'>查看发票详情接口</a>                                   |
| 发票开具   | `v2/invoice/apply_red_invoice`              | <a href='/docs/发票开具/API/申请红字发票.html'>申请红字发票接口</a>                                   |
| 发票开具   | `v2/invoice/red_invoice_issuance`           | <a href='/docs/发票开具/API/开具负数发票.html'>开具负数发票接口</a>                                   |
| 发票开具   | `v2/invoice/send_pdf_email`                 | <a href='/docs/发票开具/API/PDF邮箱推送.html'>PDF邮箱推送接口</a>                                  |
| 发票开具   | `v2/invoice/download_invoice/:invoiceNum`   | <a href='/docs/发票开具/API/下载发票.html'>下载发票接口</a>                                     |
| 电子签    | `v2/signature/upload_file`                  | <a href='/docs/电子签/API/上传文件.html'>上传文件</a>                                        |
| 电子签    | `v2/signature/describe_templates`           | <a href='/docs/电子签/API/获取模板列表.html'>获取模板列表</a>                                    |
| 电子签    | `v2/signature/convert_task`                 | <a href='/docs/电子签/API/获取转换任务.html'>获取转换任务</a>                                    |
| 电子签    | `v2/signature/create_signature_order`       | <a href='/docs/电子签/API/创建电子签订单.html'>创建电子签订单</a>                                  |
| 电子签    | `v2/signature/create_flow_by_file_directly` | <a href='/docs/电子签/API/创建签署流程.html'>创建签署流程，返回签署地址</a>                             |
| 电子签    | `/v2/signature/cancel_flow`                 | <a href='/docs/电子签/API/取消签署流程.html'>取消签署流程</a>                                    |




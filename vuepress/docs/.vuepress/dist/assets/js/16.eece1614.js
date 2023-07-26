(window.webpackJsonp=window.webpackJsonp||[]).push([[16],{302:function(_,v,t){"use strict";t.r(v);var d=t(14),a=Object(d.a)({},(function(){var _=this,v=_._self._c;return v("ContentSlotsDistributor",{attrs:{"slot-key":_.$parent.slotKey}},[v("h1",{attrs:{id:"创建商家寄件订单"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#创建商家寄件订单"}},[_._v("#")]),_._v(" 创建商家寄件订单")]),_._v(" "),v("p",[_._v("调用创建商家寄件订单接口发起商家寄件;会在创建订单成功后预扣除寄件金额;会在订单结算后进行真实扣除寄件金额;"),v("br"),_._v("\n欠费后的账号无法发起商家寄件订单,必须充值后才1-2分钟内才能恢复;")]),_._v(" "),v("h3",{attrs:{id:"请求语法"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求语法"}},[_._v("#")]),_._v(" 请求语法")]),_._v(" "),v("div",{staticClass:"language- extra-class"},[v("pre",{pre:!0,attrs:{class:"language-text"}},[v("code",[_._v("POST v2/shipment/create_order\n")])])]),v("h3",{attrs:{id:"请求头"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求头"}},[_._v("#")]),_._v(" 请求头")]),_._v(" "),v("table",[v("thead",[v("tr",[v("th",[_._v("名称")]),_._v(" "),v("th",[_._v("类型")]),_._v(" "),v("th",[_._v("是否必填")]),_._v(" "),v("th",[_._v("示例值")]),_._v(" "),v("th",[_._v("描述")])])]),_._v(" "),v("tbody",[v("tr",[v("td",[_._v("Authorization")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("授权TOKEN")])]),_._v(" "),v("tr",[v("td",[_._v("Content-Type")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("application/json;charset=UTF-8")]),_._v(" "),v("td",[_._v("默认值：application/json;charset=UTF-8")])])])]),_._v(" "),v("h3",{attrs:{id:"请求参数"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求参数"}},[_._v("#")]),_._v(" 请求参数")]),_._v(" "),v("table",[v("thead",[v("tr",[v("th",[_._v("名称")]),_._v(" "),v("th",[_._v("类型")]),_._v(" "),v("th",[_._v("是否必填")]),_._v(" "),v("th",[_._v("示例值")]),_._v(" "),v("th",[_._v("描述")])])]),_._v(" "),v("tbody",[v("tr",[v("td",[_._v("kuaidicom")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("快递公司编码，在[获取商家寄件快递公司]接口中获得")])]),_._v(" "),v("tr",[v("td",[_._v("man_name")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("收件人姓名")])]),_._v(" "),v("tr",[v("td",[_._v("phone")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("收件人手机号")])]),_._v(" "),v("tr",[v("td",[_._v("address")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("收件人所在完整地址")])]),_._v(" "),v("tr",[v("td",[_._v("send_real_name")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人姓名")])]),_._v(" "),v("tr",[v("td",[_._v("send_phone")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人手机号")])]),_._v(" "),v("tr",[v("td",[_._v("send_address")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人所在完整地址")])]),_._v(" "),v("tr",[v("td",[_._v("call_back_url")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("订单信息回调地址")])]),_._v(" "),v("tr",[v("td",[_._v("cargo")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("物品名称,例：文件。当kuaidicom=jd、yuantong时必填")])]),_._v(" "),v("tr",[v("td",[_._v("service_type")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("业务类型，默认为标准快递，各快递公司业务类型对照参考")])]),_._v(" "),v("tr",[v("td",[_._v("payment")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("支付方式，SHIPPER: 寄付（默认）。不支持到付")])]),_._v(" "),v("tr",[v("td",[_._v("weight")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("物品总重量KG，不需带单位，例：1.5")])]),_._v(" "),v("tr",[v("td",[_._v("remark")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("备注")])]),_._v(" "),v("tr",[v("td",[_._v("day_type")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("预约日期，例如：0=今天/1=明天/2=后天")])]),_._v(" "),v("tr",[v("td",[_._v("pickup_start_time")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("预约起始时间（HH:mm），例如：09:00，顺丰必填")])]),_._v(" "),v("tr",[v("td",[_._v("pickup_end_time")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("预约截止时间（HH:mm），例如：10:00，顺丰必填，预约起始时间和预约截止时间间隔需≥1小时")])]),_._v(" "),v("tr",[v("td",[_._v("channel_sw")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("渠道ID，如有多个同品牌运力，请联系商务提供后传入")])]),_._v(" "),v("tr",[v("td",[_._v("valins_pay")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("保价额度，单位：元")])]),_._v(" "),v("tr",[v("td",[_._v("real_name")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人实名信息（圆通、极兔支持 ）")])]),_._v(" "),v("tr",[v("td",[_._v("send_id_card_type")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人证件类型，1：居民身份证 ；2：港澳居民来往内地通行证 ；3：台湾居民来往大陆通行证 ；4：中国公民护照（圆通、极兔支持 ）")])]),_._v(" "),v("tr",[v("td",[_._v("send_id_card")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("寄件人证件号码 （圆通、极兔支持 ）")])]),_._v(" "),v("tr",[v("td",[_._v("password_signing")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("是否口令签收，Y：需要 N: 不需要，默认值为N（德邦快递专属参数）")])]),_._v(" "),v("tr",[v("td",[_._v("op")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("否")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("是否开启订阅功能 0：不开启(默认) 1：开启 说明开启订阅功能时：pollCallBackUrl必须填入 此功能只针对有快递单号的单")])]),_._v(" "),v("tr",[v("td",[_._v("return_type")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("面单返回类型，默认为空，不返回面单内容。10：设备打印，20：生成图片短链回调。")])]),_._v(" "),v("tr",[v("td",[_._v("siid")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("设备码，returnType为10时必填")])]),_._v(" "),v("tr",[v("td",[_._v("tempid")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("是")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("模板编码，模板id在[获取商家寄件快递公司]接口中查看")])])])]),_._v(" "),v("h3",{attrs:{id:"响应元素"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#响应元素"}},[_._v("#")]),_._v(" 响应元素")]),_._v(" "),v("table",[v("thead",[v("tr",[v("th",[_._v("名称")]),_._v(" "),v("th",[_._v("类型")]),_._v(" "),v("th",[_._v("示例值")]),_._v(" "),v("th",[_._v("描述")])])]),_._v(" "),v("tbody",[v("tr",[v("td",[_._v("data")]),_._v(" "),v("td",[_._v("对象")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("返回数据，详细查看data响应")])]),_._v(" "),v("tr",[v("td",[_._v("status")]),_._v(" "),v("td",[_._v("数字")]),_._v(" "),v("td",[_._v("200")]),_._v(" "),v("td",[_._v("请求状态；200=请求成功；400=请求失败")])]),_._v(" "),v("tr",[v("td",[_._v("msg")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("success")]),_._v(" "),v("td",[_._v("请求文字描述")])])])]),_._v(" "),v("h3",{attrs:{id:"data响应"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#data响应"}},[_._v("#")]),_._v(" data响应")]),_._v(" "),v("table",[v("thead",[v("tr",[v("th",[_._v("名称")]),_._v(" "),v("th",[_._v("类型")]),_._v(" "),v("th",[_._v("示例值")]),_._v(" "),v("th",[_._v("描述")])])]),_._v(" "),v("tbody",[v("tr",[v("td",[_._v("order_id")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("任务订单号（需要在系统回调中使用）")])]),_._v(" "),v("tr",[v("td",[_._v("task_id")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("任务ID（需要在系统回调中使用）")])]),_._v(" "),v("tr",[v("td",[_._v("kuaidinum")]),_._v(" "),v("td",[_._v("字符串")]),_._v(" "),v("td",[_._v("--")]),_._v(" "),v("td",[_._v("物流单号")])])])]),_._v(" "),v("h3",{attrs:{id:"注意事项"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#注意事项"}},[_._v("#")]),_._v(" 注意事项")]),_._v(" "),v("p",[_._v("测试过程中需要把请求参数中的day_type传值为：1，并在测试结束后进入一号通后台进行取消寄件；或者通过接口发起取消；")]),_._v(" "),v("h3",{attrs:{id:"订单状态问题"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#订单状态问题"}},[_._v("#")]),_._v(" 订单状态问题")]),_._v(" "),v("p",[_._v("创建寄件订单后商城内的订单应该为备货中,发货状态应该再订单回调的取件状态下改为已发货;")])])}),[],!1,null,null,null);v.default=a.exports}}]);
(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{312:function(t,v,_){"use strict";_.r(v);var r=_(14),a=Object(r.a)({},(function(){var t=this,v=t._self._c;return v("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[v("h1",{attrs:{id:"api概况"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#api概况"}},[t._v("#")]),t._v(" API概况")]),t._v(" "),v("p",[t._v("本文主要介绍一号通提供的相关接口API接口以及API接口的使用方法")]),t._v(" "),v("h3",{attrs:{id:"公共请求头"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#公共请求头"}},[t._v("#")]),t._v(" 公共请求头")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("名称")]),t._v(" "),v("th",[t._v("是否必填")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("Authorization")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("鉴权token，格式为：Bearer-{$token} ;其中的{$token}需要更换为鉴权token")])]),t._v(" "),v("tr",[v("td",[t._v("Content-Type")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("默认值：application/json;charset=UTF-8")])])])]),t._v(" "),v("h3",{attrs:{id:"关于短信服务api"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#关于短信服务api"}},[t._v("#")]),t._v(" 关于短信服务API")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("API")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("v2/sms_v2/send")]),t._v(" "),v("td",[t._v("发送验证短信、营销短信、通知短信接口")])]),t._v(" "),v("tr",[v("td",[t._v("v2/sms_v2/temps")]),t._v(" "),v("td",[t._v("获取当前账号下可用或者申请中的短信模板")])]),t._v(" "),v("tr",[v("td",[t._v("v2/sms_v2/record")]),t._v(" "),v("td",[t._v("获取当前账号下短信发送记录")])])])]),t._v(" "),v("h3",{attrs:{id:"关于商家寄件服务api"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#关于商家寄件服务api"}},[t._v("#")]),t._v(" 关于商家寄件服务API")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("API")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("v2/shipment/create_order")]),t._v(" "),v("td",[t._v("创建商家寄件订单")])]),t._v(" "),v("tr",[v("td",[t._v("v2/shipment/cancel_order")]),t._v(" "),v("td",[t._v("取消商家寄件订单")])]),t._v(" "),v("tr",[v("td",[t._v("v2/shipment/index")]),t._v(" "),v("td",[t._v("获取商家寄件下单订单列表")])]),t._v(" "),v("tr",[v("td",[t._v("call_back_url")]),t._v(" "),v("td",[t._v("回调接口，寄件订单发生改变推送接口")])])])]),t._v(" "),v("h3",{attrs:{id:"关于面单打印服务api"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#关于面单打印服务api"}},[t._v("#")]),t._v(" 关于面单打印服务API")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("API")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("v2/expr/dump")]),t._v(" "),v("td",[t._v("电子面单打印接口")])]),t._v(" "),v("tr",[v("td",[t._v("v2/expr/express")]),t._v(" "),v("td",[t._v("获取电子面单打印支持物流公司接口，配合打印电子面单使用，某些快递公司需要额外参数")])]),t._v(" "),v("tr",[v("td",[t._v("v2/expr/temp")]),t._v(" "),v("td",[t._v("电子面单打印模板")])]),t._v(" "),v("tr",[v("td",[t._v("v2/expr/record")]),t._v(" "),v("td",[t._v("电子面单打印记录")])])])]),t._v(" "),v("h3",{attrs:{id:"关于物流查询api"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#关于物流查询api"}},[t._v("#")]),t._v(" 关于物流查询API")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("API")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("v2/expr/query")]),t._v(" "),v("td",[t._v("查询物流接口")])]),t._v(" "),v("tr",[v("td",[t._v("v2/expr/record")]),t._v(" "),v("td",[t._v("物流接口查询记录接口")])])])]),t._v(" "),v("h3",{attrs:{id:"关于商品采集api"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#关于商品采集api"}},[t._v("#")]),t._v(" 关于商品采集API")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("API")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("v2/copy/goods")]),t._v(" "),v("td",[t._v("采集商品接口")])]),t._v(" "),v("tr",[v("td",[t._v("v2/copy/record")]),t._v(" "),v("td",[t._v("采集商品记录接口")])])])])])}),[],!1,null,null,null);v.default=a.exports}}]);
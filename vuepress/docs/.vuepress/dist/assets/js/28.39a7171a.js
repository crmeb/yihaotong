(window.webpackJsonp=window.webpackJsonp||[]).push([[28],{317:function(t,v,_){"use strict";_.r(v);var a=_(14),d=Object(a.a)({},(function(){var t=this,v=t._self._c;return v("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[v("h1",{attrs:{id:"发送短信"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#发送短信"}},[t._v("#")]),t._v(" 发送短信")]),t._v(" "),v("p",[t._v("调用发送短信接口可以发送验证码短信、通知短信、营销短信；发送短信的模板id可以在获取短信模板接口中获得")]),t._v(" "),v("h3",{attrs:{id:"请求语法"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求语法"}},[t._v("#")]),t._v(" 请求语法")]),t._v(" "),v("blockquote",[v("p",[t._v("短信签名和 AccessKey 绑定的短信签名有关系")])]),t._v(" "),v("div",{staticClass:"language- extra-class"},[v("pre",{pre:!0,attrs:{class:"language-text"}},[v("code",[t._v("POST v2/sms_v2/send\n")])])]),v("h3",{attrs:{id:"请求头"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求头"}},[t._v("#")]),t._v(" 请求头")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("名称")]),t._v(" "),v("th",[t._v("类型")]),t._v(" "),v("th",[t._v("是否必填")]),t._v(" "),v("th",[t._v("示例值")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("Authorization")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("授权TOKEN")])]),t._v(" "),v("tr",[v("td",[t._v("Content-Type")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("application/json;charset=UTF-8")]),t._v(" "),v("td",[t._v("默认值：application/json;charset=UTF-8")])])])]),t._v(" "),v("h3",{attrs:{id:"请求参数"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#请求参数"}},[t._v("#")]),t._v(" 请求参数")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("名称")]),t._v(" "),v("th",[t._v("类型")]),t._v(" "),v("th",[t._v("是否必填")]),t._v(" "),v("th",[t._v("示例值")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("phone")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("手机号")])]),t._v(" "),v("tr",[v("td",[t._v("host")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("否")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("网站地址,为了防止发送违法短信内容;联系发送人")])]),t._v(" "),v("tr",[v("td",[t._v("temp_id")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("短信模板ID")])]),t._v(" "),v("tr",[v("td",[t._v("param")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("是")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("短信参数，参数内容根据模板内容变量")])])])]),t._v(" "),v("h3",{attrs:{id:"响应元素"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#响应元素"}},[t._v("#")]),t._v(" 响应元素")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("名称")]),t._v(" "),v("th",[t._v("类型")]),t._v(" "),v("th",[t._v("示例值")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("data")]),t._v(" "),v("td",[t._v("对象")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("返回数据，详细查看data响应")])]),t._v(" "),v("tr",[v("td",[t._v("status")]),t._v(" "),v("td",[t._v("数字")]),t._v(" "),v("td",[t._v("200")]),t._v(" "),v("td",[t._v("请求状态；200=请求成功；400=请求失败")])]),t._v(" "),v("tr",[v("td",[t._v("msg")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("success")]),t._v(" "),v("td",[t._v("请求文字描述")])])])]),t._v(" "),v("h3",{attrs:{id:"data响应"}},[v("a",{staticClass:"header-anchor",attrs:{href:"#data响应"}},[t._v("#")]),t._v(" data响应")]),t._v(" "),v("table",[v("thead",[v("tr",[v("th",[t._v("名称")]),t._v(" "),v("th",[t._v("类型")]),t._v(" "),v("th",[t._v("示例值")]),t._v(" "),v("th",[t._v("描述")])])]),t._v(" "),v("tbody",[v("tr",[v("td",[t._v("content")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("发送的短信内容")])]),t._v(" "),v("tr",[v("td",[t._v("template")]),t._v(" "),v("td",[t._v("字符串")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("短信模板ID")])]),t._v(" "),v("tr",[v("td",[t._v("id")]),t._v(" "),v("td",[t._v("数字")]),t._v(" "),v("td",[t._v("--")]),t._v(" "),v("td",[t._v("发送短信的发送记录ID")])])])])])}),[],!1,null,null,null);v.default=d.exports}}]);
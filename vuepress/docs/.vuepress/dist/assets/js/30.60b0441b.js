(window.webpackJsonp=window.webpackJsonp||[]).push([[30],{319:function(t,_,v){"use strict";v.r(_);var d=v(14),a=Object(d.a)({},(function(){var t=this,_=t._self._c;return _("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[_("h1",{attrs:{id:"获取短信模板"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#获取短信模板"}},[t._v("#")]),t._v(" 获取短信模板")]),t._v(" "),_("p",[t._v("调用获取短信模板返回当前账号可用短信模板信息，模板中的模板id使用在发送短信中")]),t._v(" "),_("h3",{attrs:{id:"请求语法"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#请求语法"}},[t._v("#")]),t._v(" 请求语法")]),t._v(" "),_("div",{staticClass:"language- extra-class"},[_("pre",{pre:!0,attrs:{class:"language-text"}},[_("code",[t._v("POST v2/sms_v2/temps\n")])])]),_("h3",{attrs:{id:"请求头"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#请求头"}},[t._v("#")]),t._v(" 请求头")]),t._v(" "),_("table",[_("thead",[_("tr",[_("th",[t._v("名称")]),t._v(" "),_("th",[t._v("类型")]),t._v(" "),_("th",[t._v("是否必填")]),t._v(" "),_("th",[t._v("示例值")]),t._v(" "),_("th",[t._v("描述")])])]),t._v(" "),_("tbody",[_("tr",[_("td",[t._v("Authorization")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("是")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("授权TOKEN")])]),t._v(" "),_("tr",[_("td",[t._v("Content-Type")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("是")]),t._v(" "),_("td",[t._v("application/json;charset=UTF-8")]),t._v(" "),_("td",[t._v("默认值：application/json;charset=UTF-8")])])])]),t._v(" "),_("h3",{attrs:{id:"请求参数"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#请求参数"}},[t._v("#")]),t._v(" 请求参数")]),t._v(" "),_("table",[_("thead",[_("tr",[_("th",[t._v("名称")]),t._v(" "),_("th",[t._v("类型")]),t._v(" "),_("th",[t._v("是否必填")]),t._v(" "),_("th",[t._v("示例值")]),t._v(" "),_("th",[t._v("描述")])])]),t._v(" "),_("tbody",[_("tr",[_("td",[t._v("temp_type")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("否")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板类型：1=验证码；2=通知短信；3= 推广短信")])]),t._v(" "),_("tr",[_("td",[t._v("page")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("是")]),t._v(" "),_("td",[t._v("1")]),t._v(" "),_("td",[t._v("页码不能从1开始")])]),t._v(" "),_("tr",[_("td",[t._v("limit")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("是")]),t._v(" "),_("td",[t._v("20")]),t._v(" "),_("td",[t._v("截取条数，大于100等于100")])])])]),t._v(" "),_("h3",{attrs:{id:"响应元素"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#响应元素"}},[t._v("#")]),t._v(" 响应元素")]),t._v(" "),_("table",[_("thead",[_("tr",[_("th",[t._v("名称")]),t._v(" "),_("th",[t._v("类型")]),t._v(" "),_("th",[t._v("示例值")]),t._v(" "),_("th",[t._v("描述")])])]),t._v(" "),_("tbody",[_("tr",[_("td",[t._v("data")]),t._v(" "),_("td",[t._v("对象")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("返回数据，详细"),_("a",{attrs:{href:"#data"}},[t._v("查看data响应")])])]),t._v(" "),_("tr",[_("td",[t._v("status")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("200")]),t._v(" "),_("td",[t._v("请求状态；200=请求成功；400=请求失败")])]),t._v(" "),_("tr",[_("td",[t._v("msg")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("success")]),t._v(" "),_("td",[t._v("请求文字描述")])])])]),t._v(" "),_("h3",{attrs:{id:"data响应"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#data响应"}},[t._v("#")]),t._v(" "),_("a",{attrs:{id:"data"}},[t._v("data响应")])]),t._v(" "),_("table",[_("thead",[_("tr",[_("th",[t._v("名称")]),t._v(" "),_("th",[t._v("类型")]),t._v(" "),_("th",[t._v("示例值")]),t._v(" "),_("th",[t._v("描述")])])]),t._v(" "),_("tbody",[_("tr",[_("td",[t._v("count")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("100")]),t._v(" "),_("td",[t._v("总条数")])]),t._v(" "),_("tr",[_("td",[t._v("data")]),t._v(" "),_("td",[t._v("数组")]),t._v(" "),_("td",[t._v("[]")]),t._v(" "),_("td",[t._v("记录数据，详细"),_("a",{attrs:{href:"#data-list"}},[t._v("查看data数据")])])])])]),t._v(" "),_("h3",{attrs:{id:"data数据"}},[_("a",{staticClass:"header-anchor",attrs:{href:"#data数据"}},[t._v("#")]),t._v(" "),_("a",{attrs:{id:"data-list"}},[t._v("data数据")])]),t._v(" "),_("table",[_("thead",[_("tr",[_("th",[t._v("名称")]),t._v(" "),_("th",[t._v("类型")]),t._v(" "),_("th",[t._v("示例值")]),t._v(" "),_("th",[t._v("描述")])])]),t._v(" "),_("tbody",[_("tr",[_("td",[t._v("id")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("ID")])]),t._v(" "),_("tr",[_("td",[t._v("title")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板标题")])]),t._v(" "),_("tr",[_("td",[t._v("content")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板内容")])]),t._v(" "),_("tr",[_("td",[t._v("status")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板状态：0=待审核；1=正常；2=拒绝；3=平台拒绝;4=平台审核中")])]),t._v(" "),_("tr",[_("td",[t._v("mark")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("未通过原因")])]),t._v(" "),_("tr",[_("td",[t._v("plat")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("短信发送平台")])]),t._v(" "),_("tr",[_("td",[t._v("temp_id")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板id")])]),t._v(" "),_("tr",[_("td",[t._v("temp_type")]),t._v(" "),_("td",[t._v("数字")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("模板类型:1=验证码；2=通知短信；3= 推广短信")])]),t._v(" "),_("tr",[_("td",[t._v("created_at")]),t._v(" "),_("td",[t._v("字符串")]),t._v(" "),_("td",[t._v("--")]),t._v(" "),_("td",[t._v("添加时间")])])])])])}),[],!1,null,null,null);_.default=a.exports}}]);
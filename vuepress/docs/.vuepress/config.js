module.exports = {
    title: '一号通',
    base: '/docs/',
    description: '使用接口文档',
    head: [
        ['meta', { name: 'keywords', content: '一号通'}]
    ],
    themeConfig: {
        smoothScroll:true,
        lastUpdated:'更新时间',
        repo: 'https://gitee.com/ZhongBangKeJi/yihaotong.git',
        editLinkText: '帮助我们改善此页面！',
        docsBranch: 'master',
        editLinks: true,
        docsDir:'docs',
        sidebar: [
            {
                title: '快速入门',
                collapsable: false,
                children: [
                    '/快速入门/',
                    '/快速入门/API概况',
                    '/应用管理/APPID获取',
                    '/应用管理/获取授权TOKEN',
                ],
            },
            {
                title: '短信服务',
                collapsable: false,
                children: [
                    '/短信服务/使用说明',
                    {
                        title: 'API',
                        collapsable: false,
                        children: [
                            '/短信服务/API/发送短信',
                            '/短信服务/API/获取短信模板',
                            '/短信服务/API/发送记录',
                        ],
                    }
                ],
            },
            {
                title: '商家寄件',
                collapsable: false,
                children: [
                    '/商家寄件/使用说明',
                    {
                        title: 'API',
                        collapsable: false,
                        children: [
                            '/商家寄件/API/创建商家寄件订单',
                            '/商家寄件/API/取消寄件',
                            '/商家寄件/API/寄件订单列表',
                            '/商家寄件/API/获取商家寄件快递公司',
                            '/商家寄件/API/订单回调',
                        ],
                    }
                ],
            },
            {
                title: '面单打印',
                collapsable: false,
                children: [
                    '/面单打印/使用说明',
                    {
                        title: 'API',
                        collapsable: false,
                        children: [
                            '/面单打印/API/打印电子面单',
                            '/面单打印/API/获取物流列表',
                            '/面单打印/API/获取面单模板列表',
                            '/面单打印/API/电子面单打印记录',
                        ],
                    }
                ],
            },
            {
                title: '物流查询',
                collapsable: false,
                children: [
                    '/物流查询/使用说明',
                    {
                        title: 'API',
                        collapsable: false,
                        children: [
                            '/物流查询/API/查询物流',
                            '/物流查询/API/查询记录'
                        ],
                    }
                ],
            },
            {
                title: '商品采集',
                collapsable: false,
                children: [
                    '/商品采集/使用说明',
                    {
                        title: 'API',
                        collapsable: false,
                        children: [
                            '/商品采集/API/商品采集',
                            '/商品采集/API/采集记录'
                        ],
                    }
                ],
            },
            {
                title: '常见问题',
                collapsable: false,
                children: [
                    '/常见问题/返回说明',
                    '/常见问题/常见错误',
                ],
            },
        ],
        nav: [
            {text: '首页', link: '/'},
            {text: '一号通工作台', link: 'https://api.crmeb.com', target: '_blank'},
        ]
    },
}
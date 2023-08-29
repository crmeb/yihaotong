<?php

namespace Crmeb\Yihaotong\Enum;

/**
 * 发票服务枚举
 * Class InvoiceEnum
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 */
class InvoiceEnum
{
    const INVOKE_TYPE_51 = '51';//全电发票（铁路电子客票）
    const INVOKE_TYPE_61 = '61';//全电发票（航空运输电子客票行程单）
    const INVOKE_TYPE_81 = '81';//全电发票（增值税专用发票）
    const INVOKE_TYPE_82 = '82';//全电发票（普通发票）
    const INVOKE_TYPE_85 = '85';//全电纸质发票（增值税专用发票）
    const INVOKE_TYPE_86 = '86';//全电纸质发票（普通发票）

    //发票类型
    const INVOKE_TYPE = [
        self::INVOKE_TYPE_51 => '全电发票（铁路电子客票）',
        self::INVOKE_TYPE_61 => '全电发票（航空运输电子客票行程单）',
        self::INVOKE_TYPE_81 => '全电发票（增值税专用发票）',
        self::INVOKE_TYPE_82 => '全电发票（普通发票）',
        self::INVOKE_TYPE_85 => '全电纸质发票（增值税专用发票）',
        self::INVOKE_TYPE_86 => '全电纸质发票（普通发票）',
    ];

    const INVOKE_TSPZ_TYPE_NULL = '';//非特殊票种
    const INVOKE_TSPZ_TYPE_01 = '01';//成品油发票
    const INVOKE_TSPZ_TYPE_02 = '02';//稀土发票
    const INVOKE_TSPZ_TYPE_03 = '03';//建筑服务发票
    const INVOKE_TSPZ_TYPE_04 = '04';//货物运输服务发票
    const INVOKE_TSPZ_TYPE_05 = '05';//不动产销售服务发票
    const INVOKE_TSPZ_TYPE_06 = '06';//不动产经营租赁服务
    const INVOKE_TSPZ_TYPE_07 = '07';//代收车船税
    const INVOKE_TSPZ_TYPE_08 = '08';//通行费
    const INVOKE_TSPZ_TYPE_09 = '09';//旅客运输服务发票
    const INVOKE_TSPZ_TYPE_10 = '10';//医疗服务（住院）发票
    const INVOKE_TSPZ_TYPE_11 = '11';//医疗服务（门诊）发票
    const INVOKE_TSPZ_TYPE_12 = '12';//自产农产品销售发票
    const INVOKE_TSPZ_TYPE_13 = '13';//拖拉机和联合收割机发票
    const INVOKE_TSPZ_TYPE_14 = '14';//机动车
    const INVOKE_TSPZ_TYPE_15 = '15';//二手车
    const INVOKE_TSPZ_TYPE_16 = '16';//农产品收购发票
    const INVOKE_TSPZ_TYPE_17 = '17';//光伏收购发票
    const INVOKE_TSPZ_TYPE_18 = '18';//卷烟发票
    const INVOKE_TSPZ_TYPE_19 = '19';//出口发票
    const INVOKE_TSPZ_TYPE_20 = '20';//农产品
    const INVOKE_TSPZ_TYPE_21 = '21';//二手车 *
    const INVOKE_TSPZ_TYPE_22 = '22';//航空运输电子客票行程单
    const INVOKE_TSPZ_TYPE_51 = '51';//正常开具
    const INVOKE_TSPZ_TYPE_52 = '52';//反向开具

    //特定要素类型代码
    const INVOKE_TSPZ_TYPE = [
        self::INVOKE_TSPZ_TYPE_NULL => '非特殊票种',
        self::INVOKE_TSPZ_TYPE_01 => '成品油发票',
        self::INVOKE_TSPZ_TYPE_02 => '稀土发票',
        self::INVOKE_TSPZ_TYPE_03 => '建筑服务发票',
        self::INVOKE_TSPZ_TYPE_04 => '货物运输服务发票',
        self::INVOKE_TSPZ_TYPE_05 => '不动产销售服务发票',
        self::INVOKE_TSPZ_TYPE_06 => '不动产经营租赁服务',
        self::INVOKE_TSPZ_TYPE_07 => '代收车船税',
        self::INVOKE_TSPZ_TYPE_08 => '通行费',
        self::INVOKE_TSPZ_TYPE_09 => '旅客运输服务发票',
        self::INVOKE_TSPZ_TYPE_10 => '医疗服务（住院）发票',
        self::INVOKE_TSPZ_TYPE_11 => '医疗服务（门诊）发票',
        self::INVOKE_TSPZ_TYPE_12 => '自产农产品销售发票',
        self::INVOKE_TSPZ_TYPE_13 => '拖拉机和联合收割机发票',
        self::INVOKE_TSPZ_TYPE_14 => '机动车',
        self::INVOKE_TSPZ_TYPE_15 => '二手车',
        self::INVOKE_TSPZ_TYPE_16 => '农产品收购发票',
        self::INVOKE_TSPZ_TYPE_17 => '光伏收购发票',
        self::INVOKE_TSPZ_TYPE_18 => '卷烟发票',
        self::INVOKE_TSPZ_TYPE_19 => '出口发票',
        self::INVOKE_TSPZ_TYPE_20 => '农产品',
        self::INVOKE_TSPZ_TYPE_21 => '二手车 *',
        self::INVOKE_TSPZ_TYPE_22 => '航空运输电子客票行程单',
        self::INVOKE_TSPZ_TYPE_51 => '正常开具',
        self::INVOKE_TSPZ_TYPE_52 => '反向开具',
    ];

    const INVOKE_ZZSTSGL_TYPE_01 = '01';//简易征收
    const INVOKE_ZZSTSGL_TYPE_02 = '02';//稀土产品
    const INVOKE_ZZSTSGL_TYPE_03 = '03';//免税
    const INVOKE_ZZSTSGL_TYPE_04 = '04';//不征税
    const INVOKE_ZZSTSGL_TYPE_05 = '05';//先征后退
    const INVOKE_ZZSTSGL_TYPE_06 = '06';//100% 先征后退
    const INVOKE_ZZSTSGL_TYPE_07 = '07';//50% 先征后退
    const INVOKE_ZZSTSGL_TYPE_08 = '08';//按 3% 简易征收
    const INVOKE_ZZSTSGL_TYPE_09 = '09';//按 5% 简易征收
    const INVOKE_ZZSTSGL_TYPE_10 = '10';//按 5% 简易征收减按 1.5% 计征
    const INVOKE_ZZSTSGL_TYPE_11 = '11';//即征即退 30%
    const INVOKE_ZZSTSGL_TYPE_12 = '12';//即征即退 50%
    const INVOKE_ZZSTSGL_TYPE_13 = '13';//即征即退 70%
    const INVOKE_ZZSTSGL_TYPE_14 = '14';//即征即退 100%
    const INVOKE_ZZSTSGL_TYPE_15 = '15';//超税负 3% 即征即退
    const INVOKE_ZZSTSGL_TYPE_16 = '16';//超税负 8% 即征即退
    const INVOKE_ZZSTSGL_TYPE_17 = '17';//超税负 12% 即征即退
    const INVOKE_ZZSTSGL_TYPE_18 = '18';//超税负 6% 即征即退

    //增值税特殊管理
    const INVOKE_ZZSTSGL_TYPE = [
        self::INVOKE_ZZSTSGL_TYPE_01 => '01',
        self::INVOKE_ZZSTSGL_TYPE_02 => '02',
        self::INVOKE_ZZSTSGL_TYPE_03 => '03',
        self::INVOKE_ZZSTSGL_TYPE_04 => '04',
        self::INVOKE_ZZSTSGL_TYPE_05 => '05',
        self::INVOKE_ZZSTSGL_TYPE_06 => '06',
        self::INVOKE_ZZSTSGL_TYPE_07 => '07',
        self::INVOKE_ZZSTSGL_TYPE_08 => '08',
        self::INVOKE_ZZSTSGL_TYPE_09 => '09',
        self::INVOKE_ZZSTSGL_TYPE_10 => '10',
        self::INVOKE_ZZSTSGL_TYPE_11 => '11',
        self::INVOKE_ZZSTSGL_TYPE_12 => '12',
        self::INVOKE_ZZSTSGL_TYPE_13 => '13',
        self::INVOKE_ZZSTSGL_TYPE_14 => '14',
        self::INVOKE_ZZSTSGL_TYPE_15 => '15',
        self::INVOKE_ZZSTSGL_TYPE_16 => '16',
        self::INVOKE_ZZSTSGL_TYPE_17 => '17',
        self::INVOKE_ZZSTSGL_TYPE_18 => '18',
    ];

    //标准单位
    const STANDARD_UNIT = [
        '分', '角', '元', '千元', '万元', '亿元', '两', '斤', '毫克', '克', '千克(公斤)', '吨', '千吨',
        '万吨', '磅', '毫米', '厘米', '分米', '米', '千米(公里)', '万米', '码', '英尺', '平方毫米', '平方厘米',
        '平方分米', '平方米', '平方公里', '公顷', '亩', '毫升(立方厘米)', '公升(立方分米)', '立方米(方)', '千立方米',
        '万立方米', '亿立方米', '份', '组', '本', '箱', '卷', '瓦(W)', '千瓦', '万瓦', '千伏安时', '千瓦时(度)',
        '千千瓦时(千度)', '万千瓦时', '位(Bit)', '字节(B)', '千字节(KB)', '兆字节(MB)', '吉字节(GB)', '太字节(TB)',
        '皮字节(PB)', '个', '支', '只', '把', '条', '台', '架', '辆', '头', '件', '双', '套', '打', '包', '批',
        '匹', '部', '座', '艘', '张', '枝', '根', '块', '卷', '副', '片', '瓶', '标准箱', '万支', '盒', '桶',
        '枚', '次', '项', '株(棵)', '户', '点', '袋', '档', '朵', '顶', '罐', '回路', '间', '捆', '例', '令',
        '箩', '对', '门', '面', '付', '盘', '具', '圈', '扇', '束', '刷', '卡', '听', '筒', '粒', '串', '盏',
        '合', '轴', '尊', '节', '万', '双', '板', '版', '盆', '亿', '支', '台(套)', '万台', '万块', '万部', '床',
        '羽', '克', '拉', '盎司', '秒', '分钟', '小时', '日', '月', '季', '年', '分贝'
    ];
}

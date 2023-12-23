<?php

namespace Crmeb\Yihaotong\Option;

use Crmeb\Yihaotong\Exception\YiHaoTongException;
use Crmeb\Yihaotong\Util\Str;

/**
 * 商品
 * Class GoodsOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 */
class GoodsOption extends BaseOption
{

    /**
     * 类目分类
     * @var int
     */
    public $cateId = 0;

    /**
     * 商品名称
     * @var string
     */
    public $storeName = '';

    /**
     * 单价
     * @var string
     */
    public $unitPrice = '0';

    /**
     * 商品数量
     * @var int
     */
    public $num = 0;

    /**
     * 税率
     * @var string
     */
    public $taxRate = '0';

    /**
     * GoodsOption constructor.
     * @param string $storeName
     * @param string $unitPrice
     * @param int $num
     * @param string $taxRate
     */
    public function __construct(string $storeName = '', string $unitPrice = '0', int $num = 0, string $taxRate = '')
    {
        $this->storeName = $storeName;
        $this->unitPrice = $unitPrice;
        $this->num = $num;
        $this->taxRate = $taxRate;
    }

    /**
     * 转数组
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function toArray()
    {
        $data = [];

        if (!$this->unitPrice) {
            throw new YiHaoTongException('商品单价为必填项');
        }
        if (!$this->num) {
            throw new YiHaoTongException('商品数量为必填项');
        }

        $publicData = get_object_vars($this);

        foreach ($publicData as $key => $value) {
            $key = Str::snake($key);
            $data[$key] = $value;
        }

        return $data;
    }
}

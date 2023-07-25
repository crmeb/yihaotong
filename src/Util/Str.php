<?php

namespace Crmeb\Yihaotong\Util;

/**
 * Class Str
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong\Util
 */
class Str
{

    /**
     * @var array
     */
    protected static $studlyCache = [];


    /**
     * @param $value
     * @return array|mixed|string|string[]
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/12
     */
    public static function studly($value)
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }

        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return static::$studlyCache[$key] = str_replace(' ', '', $value);
    }

    /**
     * 验证手机号
     * @param string $value
     * @return false|int
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2022/10/13
     */
    public static function checkPhone(string $value)
    {
        return preg_match('/^(13[0-9]|14[01456879]|15[0-35-9]|16[2567]|17[0-8]|18[0-9]|19[0-35-9])[0-9]{8}$/', $value);
    }
}

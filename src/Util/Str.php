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

    protected static $snakeCache = [];

    /**
     * @var array
     */
    protected static $studlyCache = [];


    /**
     * 下划线转驼峰(首字母大写)
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
     * 驼峰转下划线
     * @param string $value
     * @param string $delimiter
     * @return string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public static function snake(string $value, string $delimiter = '_'): string
    {
        $key = $value;

        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }

        if (!ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', $value);

            $value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }

        return static::$snakeCache[$key][$delimiter] = $value;
    }

    /**
     * 字符串转小写
     *
     * @param string $value
     * @return string
     */
    public static function lower(string $value): string
    {
        return mb_strtolower($value, 'UTF-8');
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

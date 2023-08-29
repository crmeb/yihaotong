<?php

namespace Crmeb\Yihaotong\Option;


use Crmeb\Yihaotong\Exception\YiHaoTongException;

/**
 * Class BaseOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 */
abstract class BaseOption
{

    /**
     * 转换为数组
     * @return mixed
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    abstract public function toArray();

    /**
     * 数据验证
     * @param array $rules
     * @param array $message
     * @param array $data
     * @return bool
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function validate(array $rules, array $message, array $data)
    {
        $validate = $this->getValidateClass();

        $error = [];

        foreach ($rules as $key => $item) {
            $rule = explode('|', $item);
            foreach ($rule as $ru) {
                if (!isset($data[$key])) {
                    $error[] = $message[$key . '.' . $ru];
                } else {
                    $res = $validate->{$ru}($data[$key]);

                    if (!$res) {
                        $error[] = $message[$key . '.' . $ru];
                    }
                }
            }
        }

        if ($error) {
            throw new YiHaoTongException($error[0]);
        }

        return true;
    }

    /**
     * 获取验证类
     * @return object
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/29
     */
    public function getValidateClass()
    {
        return new class() {

            /**
             * 必填项
             * @param $value
             * @return bool
             * @author 等风来
             * @email 136327134@qq.com
             * @date 2023/8/29
             */
            public function require($value)
            {
                return !!$value;
            }

            /**
             * 是否为数字
             * @param $value
             * @return bool
             * @author 等风来
             * @email 136327134@qq.com
             * @date 2023/8/29
             */
            public function number($value)
            {
                return is_numeric($value);
            }
        };
    }
}

<?php

namespace Crmeb\Yihaotong\Option;


use Crmeb\Yihaotong\Exception\YiHaoTongValidateExecption;

/**
 * Class BaseOption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/29
 */
abstract class BaseOption
{

    protected $message = [];

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

        $this->message = $message;

        $error = [];

        foreach ($rules as $key => $item) {
            [$key, $index, $keyVal] = strstr($key, '.') !== false ? explode('.', $key) : [$key, '*', ''];
            $rule = explode('|', $item);
            foreach ($rule as $ru) {
                [$ru, $ruVal] = strstr($ru, ':') !== false ? explode(':', $ru) : [$ru, null];
                if (!isset($data[$key])) {

                    $error[] = $this->getMessage($key . '.' . $ru);

                } else {

                    if ($keyVal && is_array($data[$key])) {
                        if ('*' === $index) {
                            $validateData = array_column($data[$key], $keyVal);
                            if (!$validateData) {
                                $error = array_merge($error, $this->getMessages($key, $message));
                                continue;
                            }

                            foreach ($validateData as $value) {
                                $res = $validate->{$ru}($value, $ruVal);
                                if (!$res) {
                                    $error[] = $this->getMessage($key . '.' . $index . '.' . $keyVal . '.' . $ru);
                                }
                            }
                        } else {

                            if (!isset($data[$key][$index][$keyVal])) {
                                $error = array_merge($error, $this->getMessages($key, $message));
                                continue;
                            }

                            $res = $validate->{$ru}($data[$key][$index][$keyVal], $ruVal);

                            if (!$res) {
                                $error[] = $this->getMessage($key . '.' . $index . '.' . $keyVal . '.' . $ru);
                            }
                        }
                    } else {
                        $res = $validate->{$ru}($data[$key], $ruVal);

                        if (!$res) {
                            $error[] = $this->getMessage($key . '.' . $ru);
                        }
                    }
                }
            }
        }

        if ($error) {
            throw new YiHaoTongValidateExecption($error[0]);
        }

        return true;
    }

    /**
     * 获取错误信息
     * @param $key
     * @param array $message
     * @return mixed|string
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/30
     */
    public function getMessage($key, array $message = [])
    {
        $message = $message ?: $this->message;
        return $message[$key] ?? 'validate error';
    }

    /**
     * 获取所有错误内容
     * @param string $key
     * @param array $message
     * @return array
     * @author 等风来
     * @email 136327134@qq.com
     * @date 2023/8/30
     */
    protected function getMessages(string $key, array $message)
    {
        $error = [];
        foreach ($message as $k => $item) {
            [$kk, , ,] = explode('.', $k);
            if ($key === $kk) {
                $error[] = $item;
            }
        }

        return $error;
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
                return !is_null($value) && '' !== $value;
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

            /**
             * 大于
             * @param $value
             * @param $gtValue
             * @return bool
             * @author 等风来
             * @email 136327134@qq.com
             * @date 2023/8/30
             */
            public function gt($value, $gtValue)
            {
                return $value > $gtValue;
            }
        };
    }
}

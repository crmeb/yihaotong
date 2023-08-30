<?php

namespace Crmeb\Yihaotong\Exception;

use Throwable;

/**
 * 验证类错误
 * Class YiHaoTongValidateExecption
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2023/8/30
 * @package Crmeb\Yihaotong\Exception
 */
class YiHaoTongValidateExecption extends \RuntimeException
{
    /**
     * YiHaoTongException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}


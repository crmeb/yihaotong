<?php

namespace Crmeb\Yihaotong\Exception;

use Throwable;

/**
 * Class YiHaoTongException
 * @author 等风来
 * @email 136327134@qq.com
 * @date 2022/10/12
 * @package Crmeb\Yihaotong\Exception
 */
class YiHaoTongException extends \RuntimeException
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

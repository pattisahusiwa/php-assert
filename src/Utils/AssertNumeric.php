<?php declare(strict_types=1);

namespace Xynha\Assert\Utils;

trait AssertNumeric
{
    use AbstractHandler;

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isInt($value, $handler = null, string $msg = '') : bool
    {
        if (is_int($value)) {
            return true;
        }

        $msg = static::expectMessage('integer', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isFloat($value, $handler = null, string $msg = '') : bool
    {
        if (is_float($value)) {
            return true;
        }

        $msg = static::expectMessage('float', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

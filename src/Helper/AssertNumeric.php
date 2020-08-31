<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertNumeric extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isInt($value, $handler, string $msg) : bool
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
    public static function isFloat($value, $handler, string $msg) : bool
    {
        if (is_float($value)) {
            return true;
        }

        $msg = static::expectMessage('float', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isNumeric($value, $handler, string $msg) : bool
    {
        if (is_numeric($value) || $value == (int)$value) {
            return true;
        }

        $msg = static::expectMessage('float', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

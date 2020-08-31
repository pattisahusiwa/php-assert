<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertNumeric extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isInt($value, $handler, string $msg) : bool
    {
        if (is_int($value)) {
            return true;
        }

        $msg = static::expectMessage('an integer', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isFloat($value, $handler, string $msg) : bool
    {
        if (is_float($value)) {
            return true;
        }

        $msg = static::expectMessage('a float', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isNumeric($value, $handler, string $msg) : bool
    {
        if (is_numeric($value)) {
            return true;
        }

        $msg = static::expectMessage('a numeric value', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

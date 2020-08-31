<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertMixed extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isNull($value, $handler, string $msg) : bool
    {
        if (is_null($value)) {
            return true;
        }

        $msg = static::expectMessage('NULL', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isNotNull($value, $handler, string $msg) : bool
    {
        if (is_null($value) === false) {
            return true;
        }

        $msg = static::expectMessage('not NULL', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isScalar($value, $handler, string $msg) : bool
    {
        if (is_scalar($value)) {
            return true;
        }

        $msg = static::expectMessage('a scalar', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

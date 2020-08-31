<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertArray extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isArray($value, $handler, string $msg) : bool
    {
        if (is_array($value)) {
            return true;
        }

        $msg = static::expectMessage('an array', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isIterable($value, $handler, string $msg) : bool
    {
        if (is_iterable($value)) {
            return true;
        }

        $msg = static::expectMessage('an Iterable', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isCountable($value, $handler, string $msg) : bool
    {
        if (is_countable($value)) {
            return true;
        }

        $msg = static::expectMessage('a Countable', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

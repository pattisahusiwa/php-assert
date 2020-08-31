<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertBool extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isBool($value, $handler, string $msg) : bool
    {
        if (is_bool($value)) {
            return true;
        }

        $msg = static::expectMessage('boolean', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /** @param null|string $handler */
    public static function isTrue(bool $value, $handler, string $msg) : bool
    {
        if ($value === true) {
            return true;
        }

        $msg = static::expectMessage('value to be true', $value, $msg, 'false');
        return static::handleError($handler, $msg);
    }

    /** @param null|string $handler */
    public static function isFalse(bool $value, $handler, string $msg) : bool
    {
        if ($value === false) {
            return true;
        }

        $msg = static::expectMessage('value to be false', $value, $msg, 'true');
        return static::handleError($handler, $msg);
    }
}
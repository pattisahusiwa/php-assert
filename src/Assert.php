<?php declare(strict_types=1);

namespace Xynha\Assert;

use Xynha\Assert\Helper\AssertBool;
use Xynha\Assert\Helper\AssertNumeric;

final class Assert
{

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isBool($value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isBool($value, $handler, $msg);
    }

    /** @param null|string $handler */
    public static function isTrue(bool $value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isTrue($value, $handler, $msg);
    }

    /** @param null|string $handler */
    public static function isFalse(bool $value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isFalse($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isInt($value, $handler = null, string $msg = '') : bool
    {
        return AssertNumeric::isInt($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string $handler
     */
    public static function isFloat($value, $handler = null, string $msg = '') : bool
    {
        return AssertNumeric::isFloat($value, $handler, $msg);
    }
}

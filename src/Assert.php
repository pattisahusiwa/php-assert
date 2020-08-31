<?php declare(strict_types=1);

namespace Xynha\Assert;

use Xynha\Assert\Helper\AssertArray;
use Xynha\Assert\Helper\AssertBool;
use Xynha\Assert\Helper\AssertNumeric;
use Xynha\Assert\Helper\AssertObject;
use Xynha\Assert\Helper\AssertString;

final class Assert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isBool($value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isBool($value, $handler, $msg);
    }

    /** @param null|string|false $handler */
    public static function isTrue(bool $value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isTrue($value, $handler, $msg);
    }

    /** @param null|string|false $handler */
    public static function isFalse(bool $value, $handler = null, string $msg = '') : bool
    {
        return AssertBool::isFalse($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isInt($value, $handler = null, string $msg = '') : bool
    {
        return AssertNumeric::isInt($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false$handler
     */
    public static function isFloat($value, $handler = null, string $msg = '') : bool
    {
        return AssertNumeric::isFloat($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isNumeric($value, $handler = null, string $msg = '') : bool
    {
        return AssertNumeric::isNumeric($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isString($value, $handler = null, string $msg = '') : bool
    {
        return AssertString::isString($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isArray($value, $handler = null, string $msg = '') : bool
    {
        return AssertArray::isArray($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isObject($value, $handler = null, string $msg = '') : bool
    {
        return AssertObject::isObject($value, $handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isCallable($value, $handler = null, string $msg = '') : bool
    {
        return AssertObject::isCallable($value, $handler, $msg);
    }
}

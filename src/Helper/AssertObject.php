<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertObject extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isCallable($value, $handler, string $msg) : bool
    {
        if (is_callable($value)) {
            return true;
        }

        $msg = static::expectMessage('a callable', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isObject($value, $handler, string $msg) : bool
    {
        if (is_object($value)) {
            return true;
        }

        $msg = static::expectMessage('an object', $value, $msg);
        return static::handleError($handler, $msg);
    }

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isResource($value, $handler, string $msg) : bool
    {
        if (is_resource($value)) {
            return true;
        }

        $msg = static::expectMessage('a resource', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

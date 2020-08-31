<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertCallable extends AbstractAssert
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
}

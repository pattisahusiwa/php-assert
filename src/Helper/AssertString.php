<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

final class AssertString extends AbstractAssert
{

    /**
     * @param mixed $value
     * @param null|string|false $handler
     */
    public static function isString($value, $handler, string $msg) : bool
    {
        if (is_string($value)) {
            return true;
        }

        $msg = static::expectMessage('a string', $value, $msg);
        return static::handleError($handler, $msg);
    }
}

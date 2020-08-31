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
}

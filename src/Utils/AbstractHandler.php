<?php declare(strict_types=1);

namespace Xynha\Assert\Utils;

trait AbstractHandler
{

    /** @param null|string $handler */
    abstract protected static function handleError($handler = null, string $msg = '') : bool;

    /** @param mixed $value */
    protected static function typeToString($value) : string
    {
        return \is_object($value) ? \get_class($value) : \gettype($value);
    }

    /** @param mixed $value */
    protected static function expectMessage(string $expected, $value, string $message) : string
    {
        if (!empty($message)) {
            return $message;
        }

        return 'Expect a ' . $expected . '. Got: ' . static::typeToString($value);
    }
}

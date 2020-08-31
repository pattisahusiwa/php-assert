<?php declare(strict_types=1);

namespace Xynha\Assert\Helper;

use InvalidArgumentException;
use LogicException;
use Throwable;

abstract class AbstractAssert
{

    /** @param null|string|false $handler */
    protected static function handleError($handler, string $msg) : bool
    {
        if ($handler === false) {
            return false;
        }

        if (empty($handler)) {
            throw new InvalidArgumentException($msg);
        }

        if (class_exists($handler) === false) {
            throw new LogicException('$handler is not a class name');
        }

        // @todo: Do not reconstruct the handler. Atm, We have no choice
        // ($handler instanceof Throwable) will return false
        // is_a($handler, Throwable::class) will return false
        $object = new $handler;
        if ($object instanceof Throwable) {
            throw new $handler($msg);
        }

        throw new LogicException('$handler is not a Throwable');
    }

    /** @param mixed $value */
    protected static function typeToString($value) : string
    {
        return \is_object($value) ? \get_class($value) : \gettype($value);
    }

    /** @param mixed $value */
    protected static function expectMessage(string $expected, $value, string $message, string $got = '') : string
    {
        if (!empty($message)) {
            return $message;
        }

        $got = $got !== '' ? $got : static::typeToString($value);

        return 'Expect ' . $expected . '. Got: ' . $got;
    }
}

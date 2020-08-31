<?php declare(strict_types=1);

namespace Xynha\Assert;

use Exception;
use InvalidArgumentException;
use LogicException;
use Throwable;
use Xynha\Assert\Utils\AssertBool;

final class Assert
{
    use AssertBool;

    /** @param null|string $handler */
    protected static function handleError($handler = null, string $msg = '') : void
    {
        if (empty($handler)) {
            throw new InvalidArgumentException($msg);
        }

        if (class_exists($handler) === false) {
            throw new LogicException('$handler is not a class name');
        }

        // @todo: Do not reconstruct the handler
        // ($handler instanceof Throwable) will return false
        // is_a($handler, Throwable::class) will return false
        $object = new $handler;
        if ($object instanceof Throwable) {
            throw new $handler($msg);
        }

        throw new LogicException('$handler is not a Throwable');
    }
}

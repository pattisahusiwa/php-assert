<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class HandlerTest extends TestCase
{

    public function testDefaultExceptionAndMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a boolean. Got: NULL');

        Assert::isBool(null);
    }

    public function testDefaultExceptionAndCustomMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Custom exception message');

        Assert::isBool(null, null, 'Custom exception message');
    }

    public function testCustomExceptionAndDefaultMessage()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Expect a boolean. Got: string');

        Assert::isBool('false', UnexpectedValueException::class);
    }

    public function testCustomExceptionAndMessage()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Custom exception message');

        Assert::isBool('false', UnexpectedValueException::class, 'Custom exception message');
    }

    public function testInvalidClassname()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('$handler is not a class name');

        Assert::isBool(null, 'InvalidClassName');
    }

    public function testNotThrowable()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('$handler is not a Throwable');

        Assert::isBool(null, '\DateTime');
    }
}

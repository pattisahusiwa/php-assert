<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertCallableTest extends TestCase
{

    public function testValidIsCallable()
    {
        $this->assertTrue(Assert::isCallable([new DateTime(), 'format']));

        $this->assertTrue(Assert::isCallable(function () {
        }));
    }

    public function testInvalidIsCallable()
    {
        $this->assertFalse(Assert::isCallable([], false));
        $this->assertFalse(Assert::isCallable(['InvalidClass', 'InvalidMethod'], false));
    }

    public function testIsCallableErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a callable. Got: string');

        Assert::isCallable('0.0');
    }
}

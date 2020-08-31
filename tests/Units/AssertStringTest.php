<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertStringTest extends TestCase
{

    public function testValidIsString()
    {
        $this->assertTrue(Assert::isString(''));
        $this->assertTrue(Assert::isString(' '));
        $this->assertTrue(Assert::isString('abc'));
        $this->assertTrue(Assert::isString('23'));
        $this->assertTrue(Assert::isString('23.5'));
        $this->assertTrue(Assert::isString('0'));
    }

    public function testInvalidIsString()
    {
        $this->assertFalse(Assert::isString(false, false));
        $this->assertFalse(Assert::isString(true, false));
        $this->assertFalse(Assert::isString(37, false));
        $this->assertFalse(Assert::isString(3.7, false));
        $this->assertFalse(Assert::isString(null, false));
        $this->assertFalse(Assert::isString([], false));
    }

    public function testIsStringErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a string. Got: double');

        Assert::isString(0.0);
    }
}

<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertBoolTest extends TestCase
{

    public function testValidIsBool()
    {
        $this->assertTrue(Assert::isBool(true));
        $this->assertTrue(Assert::isBool(false));
    }

    public function testInvalidIsBool()
    {
        $this->assertFalse(Assert::isBool(0, false));
        $this->assertFalse(Assert::isBool('', false));
        $this->assertFalse(Assert::isBool(null, false));
        $this->assertFalse(Assert::isBool([], false));
    }

    public function testIsBoolErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a boolean. Got: integer');

        Assert::isBool(0);
    }

    public function testValidIsTrue()
    {
        $this->assertTrue(Assert::isTrue(true));
    }

    public function testInvalidIsTrue()
    {
        $this->assertFalse(Assert::isTrue(false, false));
    }

    public function testIsTrueErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be true. Got: false');

        Assert::isTrue(false);
    }

    public function testValidIsFalse()
    {
        $this->assertTrue(Assert::isFalse(false));
    }

    public function testInvalidIsFalse()
    {
        $this->assertFalse(Assert::isFalse(true, false));
    }

    public function testIsFalseErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be false. Got: true');

        Assert::isFalse(true);
    }
}

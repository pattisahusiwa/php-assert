<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertBoolTest extends TestCase
{

    public function testValidBoolean()
    {
        $this->assertTrue(Assert::isBool(true));
        $this->assertTrue(Assert::isBool(false));
    }

    public function testInvalidBoolean()
    {
        $this->assertFalse(Assert::isBool(0, false));
        $this->assertFalse(Assert::isBool('', false));
        $this->assertFalse(Assert::isBool(null, false));
        $this->assertFalse(Assert::isBool([], false));
    }

    public function testBoolErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a boolean. Got: integer');

        Assert::isBool(0);
    }

    public function testValidTrue()
    {
        $this->assertTrue(Assert::isTrue(true));
    }

    public function testInvalidTrue()
    {
        $this->assertFalse(Assert::isTrue(false, false));
    }

    public function testTrueErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be true. Got: false');

        Assert::isTrue(false);
    }

    public function testValidFalse()
    {
        $this->assertTrue(Assert::isFalse(false));
    }

    public function testInvalidFalse()
    {
        $this->assertFalse(Assert::isFalse(true, false));
    }

    public function testFalseErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be false. Got: true');

        Assert::isFalse(true);
    }
}

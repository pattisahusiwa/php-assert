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
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a boolean. Got: string');

        $this->assertTrue(Assert::isBool(''));
    }

    public function testValidTrue()
    {
        $this->assertTrue(Assert::isTrue(true));
    }

    public function testInvalidTrue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be true. Got: false');

        $this->assertTrue(Assert::isTrue(false));
    }

    public function testValidFalse()
    {
        $this->assertTrue(Assert::isFalse(false));
    }

    public function testInvalidFalse()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a value to be false. Got: true');

        $this->assertTrue(Assert::isFalse(true));
    }
}

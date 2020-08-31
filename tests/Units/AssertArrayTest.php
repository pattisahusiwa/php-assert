<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertArrayTest extends TestCase
{

    public function testValidIsArray()
    {
        $this->assertTrue(Assert::isArray([]));
        $this->assertTrue(Assert::isArray(['']));
        $this->assertTrue(Assert::isArray(['abc']));
        $this->assertTrue(Assert::isArray([23]));
        $this->assertTrue(Assert::isArray([23.5]));
        $this->assertTrue(Assert::isArray([true]));
    }

    public function testInvalidIsArray()
    {
        $this->assertFalse(Assert::isArray(false, false));
        $this->assertFalse(Assert::isArray(true, false));
        $this->assertFalse(Assert::isArray(37, false));
        $this->assertFalse(Assert::isArray(3.7, false));
        $this->assertFalse(Assert::isArray(null, false));
        $this->assertFalse(Assert::isArray('', false));
    }

    public function testIsArrayErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect an array. Got: string');

        Assert::isArray('0.0');
    }
}

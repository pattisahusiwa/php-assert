<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertNumericTest extends TestCase
{

    public function testValidInt()
    {
        $this->assertTrue(Assert::isInt(10));
    }

    public function testInvalidInt()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a integer. Got: double');

        $this->assertTrue(Assert::isInt(1.0));
    }

    public function testValidFloat()
    {
        $this->assertTrue(Assert::isFloat(1.0));
    }

    public function testInvalidFloat()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a float. Got: integer');

        $this->assertTrue(Assert::isFloat(10));
    }
}

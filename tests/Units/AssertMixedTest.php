<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertMixedTest extends TestCase
{

    public function testValidIsNull()
    {
        $this->assertTrue(Assert::isNull(null));
    }

    public function testInvalidIsNull()
    {
        $this->assertFalse(Assert::isNull(false, false));
        $this->assertFalse(Assert::isNull(true, false));
        $this->assertFalse(Assert::isNull(37, false));
        $this->assertFalse(Assert::isNull(3.7, false));
        $this->assertFalse(Assert::isNull([], false));
    }

    public function testIsNullErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect NULL. Got: double');

        Assert::isNull(0.0);
    }

    public function testValidIsNotNull()
    {
        $this->assertTrue(Assert::isNotNull(false));
        $this->assertTrue(Assert::isNotNull(true));
        $this->assertTrue(Assert::isNotNull([]));
    }

    public function testInvalidIsNotNull()
    {
        $this->assertFalse(Assert::isNotNull(null, false));
    }

    public function testIsNotNullErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect not NULL. Got: NULL');

        Assert::isNotNull(null);
    }

    public function testValidIsScalar()
    {
        $this->assertTrue(Assert::isScalar(false));
        $this->assertTrue(Assert::isScalar(true));
        $this->assertTrue(Assert::isScalar(10));
        $this->assertTrue(Assert::isScalar(10e1));
        $this->assertTrue(Assert::isScalar(10.1));
        $this->assertTrue(Assert::isScalar('abc'));
    }

    public function testInvalidIsScalar()
    {
        $this->assertFalse(Assert::isScalar(null, false));
        $this->assertFalse(Assert::isScalar([], false));
        $this->assertFalse(Assert::isScalar(new stdClass, false));
    }

    public function testIsScalarErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a scalar. Got: NULL');

        Assert::isScalar(null);
    }
}

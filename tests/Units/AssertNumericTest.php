<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertNumericTest extends TestCase
{

    public function testValidInt()
    {
        $this->assertTrue(Assert::isInt(1337));
        $this->assertTrue(Assert::isInt(0x539));
        $this->assertTrue(Assert::isInt(02471));
        $this->assertTrue(Assert::isInt(0b10100111001));
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
        $this->assertTrue(Assert::isFloat(1337e0));
    }

    public function testInvalidFloat()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a float. Got: integer');

        $this->assertTrue(Assert::isFloat(10));
    }

    public function testValidNumeric()
    {
        $this->assertTrue(Assert::isNumeric('42'));
        $this->assertTrue(Assert::isNumeric(42));

        $this->assertTrue(Assert::isNumeric(0x539));

        $this->assertTrue(Assert::isNumeric(02471));
        $this->assertTrue(Assert::isNumeric('02471'));

        $this->assertTrue(Assert::isNumeric(0b10100111001));

        $this->assertTrue(Assert::isNumeric(1337e0));
        $this->assertTrue(Assert::isNumeric('1337e0'));

        $this->assertTrue(Assert::isNumeric(9.1));
        $this->assertTrue(Assert::isNumeric('9.1'));
    }

    public function testValidStringNumeric()
    {
        $this->assertTrue(Assert::isNumeric('0x539'));
        $this->assertTrue(Assert::isNumeric('0b10100111001'));
    }
}

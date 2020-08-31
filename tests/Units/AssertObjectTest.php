<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertObjectTest extends TestCase
{

    public function testValidIsObject()
    {
        $this->assertTrue(Assert::isObject(new stdClass));
    }

    public function testInvalidIsObject()
    {
        $this->assertFalse(Assert::isObject(false, false));
        $this->assertFalse(Assert::isObject(true, false));
        $this->assertFalse(Assert::isObject(37, false));
        $this->assertFalse(Assert::isObject(3.7, false));
        $this->assertFalse(Assert::isObject(null, false));
        $this->assertFalse(Assert::isObject('', false));
    }

    public function testIsObjectErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect an object. Got: string');

        Assert::isObject('0.0');
    }
}
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

    public function testValidIsIterable()
    {
        $iter = new ArrayIterator([1, 2, 3]);
        $fn = (function () {
            yield 1;
        })();

        $this->assertTrue(Assert::isIterable([]));
        $this->assertTrue(Assert::isIterable(new ArrayIterator()));
        $this->assertTrue(Assert::isIterable($iter));
        $this->assertTrue(Assert::isIterable($fn));
    }

    public function testInvalidIsIterable()
    {
        $this->assertFalse(Assert::isIterable(null, false));
    }

    public function testIsIterableErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect an Iterable. Got: Closure');

        $fn = function () {
            yield 1;
        };

        Assert::isIterable($fn);
    }

    public function testValidIsCountable()
    {
        $iter = new ArrayIterator([1, 2, 3]);

        $this->assertTrue(Assert::isCountable([]));
        $this->assertTrue(Assert::isCountable(new ArrayIterator()));
        $this->assertTrue(Assert::isCountable($iter));
    }

    public function testInvalidIsCountable()
    {
        $fn = (function () {
            yield 1;
        })();

        $this->assertFalse(Assert::isCountable($fn, false));
        $this->assertFalse(Assert::isCountable(null, false));
    }

    public function testIsCountableErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a Countable. Got: Generator');

        $fn = (function () {
            yield 1;
        })();
        Assert::isCountable($fn);
    }
}

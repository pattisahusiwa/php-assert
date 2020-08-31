<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Xynha\Assert\Assert;

final class AssertObjectTest extends TestCase
{

    public function testValidIsCallable()
    {
        $closure = function () {
            yield 1;
        };

        $empty = function () {
        };

        $fnName = 'is_object';
        $instance = [new DateTime(), 'format'];

        $this->assertTrue(Assert::isCallable($fnName));
        $this->assertTrue(Assert::isCallable($instance));
        $this->assertTrue(Assert::isCallable($closure));
        $this->assertTrue(Assert::isCallable($empty));
    }

    public function testInvalidIsCallable()
    {
        $generator = (function () {
            yield 1;
        })();
        $callback = ['InvalidClass', 'InvalidMethod'];
        $classname = ['\DateTime', 'format'];

        $this->assertFalse(Assert::isCallable([], false));
        $this->assertFalse(Assert::isCallable($callback, false));
        $this->assertFalse(Assert::isCallable($generator, false));
        $this->assertFalse(Assert::isCallable($classname, false));
    }

    public function testIsCallableErrorMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect a callable. Got: string');

        Assert::isCallable('0.0');
    }

    public function testValidIsObject()
    {
        $generator = (function () {
            yield 1;
        })();

        $closure = function () {
            yield 1;
        };

        $empty = function () {
        };

        $this->assertTrue(Assert::isObject(new stdClass));
        $this->assertTrue(Assert::isObject($generator));
        $this->assertTrue(Assert::isObject($closure));
        $this->assertTrue(Assert::isObject($empty));
    }

    public function testInvalidIsObject()
    {
        $fnName = 'is_object';
        $callback = [new DateTime(), 'format'];

        $this->assertFalse(Assert::isObject(null, false));
        $this->assertFalse(Assert::isObject($fnName, false));
        $this->assertFalse(Assert::isObject($callback, false));
    }

    public function testIsObjectErrorMessage()
    {
        $callback = [new DateTime(), 'format'];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect an object. Got: array');

        Assert::isObject($callback);
    }

    public function testValidIsResource()
    {
        $this->assertTrue(Assert::isResource(opendir(__DIR__)));
    }

    public function testInvalidIsResource()
    {
        $fnName = 'is_object';
        $callback = [new DateTime(), 'format'];
        $generator = (function () {
            yield 1;
        })();

        $closure = function () {
            yield 1;
        };

        $empty = function () {
        };

        $this->assertFalse(Assert::isResource(null, false));
        $this->assertFalse(Assert::isResource($fnName, false));
        $this->assertFalse(Assert::isResource($callback, false));
        $this->assertFalse(Assert::isResource($generator, false));
        $this->assertFalse(Assert::isResource($closure, false));
        $this->assertFalse(Assert::isResource($empty, false));
    }

    public function testIsResourceErrorMessage()
    {
        $callback = [new DateTime(), 'format'];

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect an object. Got: array');

        Assert::isObject($callback);
    }
}

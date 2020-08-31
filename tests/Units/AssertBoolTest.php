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
}

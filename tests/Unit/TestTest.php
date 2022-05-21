<?php

namespace test\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    public function test_call_method_foo()
    {
        $test = new Test();
        $result = $test->foo();

        $this->assertEquals("123", $result);
    }
}

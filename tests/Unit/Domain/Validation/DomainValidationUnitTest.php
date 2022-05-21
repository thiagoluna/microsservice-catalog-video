<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;

class DomainValidationUnitTest extends TestCase
{
    public function test_not_null(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("error");

        $value = '';
        $exceptionMessage = 'error';
        DomainValidation::notNull($value, $exceptionMessage);
    }

    public function test_str_min_length(): void
    {
        $value = '12';
        $length = 3;

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("should not be less than {$length}.");

        DomainValidation::strMinLength($value, $length);
    }

    public function test_str_max_length(): void
    {
        $value = '123456';
        $length = 5;

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("should not be bigger than {$length}.");

        DomainValidation::strMaxLength($value, $length);
    }
}
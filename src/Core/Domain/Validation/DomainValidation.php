<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $exceptionMessage = ''): void
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'should not be empty.');
        }
    }

    public static function strMinLength(string $value, int $length = 2, string $exceptionMessage = null): void
    {
        if (strlen($value) < $length) {
            throw new EntityValidationException($exceptionMessage ?? "should not be less than {$length}.");
        }
    }

    public static function strMaxLength(string $value, int $length = 7, string $exceptionMessage = null): void
    {
        if (strlen($value) > $length) {
            throw new EntityValidationException($exceptionMessage ?? "should not be bigger than {$length}.");
        }
    }
}
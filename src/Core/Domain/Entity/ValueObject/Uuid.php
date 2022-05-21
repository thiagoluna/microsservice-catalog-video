<?php

declare(strict_types=1);

namespace Core\Domain\Entity\ValueObject;

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(protected string $value)
    {
        $this->isValid($value);
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    private function isValid(string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidArgumentException("Invalid Uuid");
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
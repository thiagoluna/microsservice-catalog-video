<?php

declare(strict_types=1);

namespace Core\Domain\Entity\Traits;

use Exception;

trait MagicMethodsTrait
{
    public function __get($attribute)
    {
        if (isset($this->{$attribute})) {
            return $this->{$attribute};
        }

        throw new Exception("Property {$attribute} not found.");
    }

    public function id(): string
    {
        return (string) $this->id;
    }

    public function createdAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }
}
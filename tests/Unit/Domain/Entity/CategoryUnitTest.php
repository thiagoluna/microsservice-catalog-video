<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CategoryUnitTest extends TestCase
{
    public function test_attributes(): void
    {
        $category = new Category(
            name: "Cat 1",
            description: "Desc 1",
            isActive: true,
        );

        $this->assertNotEmpty($category->id());
        $this->assertEquals('Cat 1', $category->name);
        $this->assertEquals('Desc 1', $category->description);
        $this->assertEquals(true, $category->isActive);
        $this->assertNotEmpty($category->createdAt());
    }

    public function test_activated()
    {
        $category = new Category(
            name: "Cat 1",
            description: "Desc 1",
            isActive: false,
        );
        $this->assertFalse($category->isActive);

        $category->activate();
        $this->assertTrue($category->isActive);
    }

    public function test_deactivated()
    {
        $category = new Category(
            name: "Cat 1",
            description: "Desc 1",
        );
        $this->assertTrue($category->isActive);

        $category->deactivate();
        $this->assertFalse($category->isActive);
    }

    public function test_update()
    {
        $uuid = Uuid::uuid4()->toString();

        $category = new Category(
            id: $uuid,
            name: "Cat 1",
            description: "Desc 1",
            createdAt: "2022-05-23",
        );

        $category->update(
            name: "Cat 2",
            description: "Desc 2",
        );

        $this->assertEquals($uuid, $category->id());
        $this->assertEquals('Cat 2', $category->name);
        $this->assertEquals('Desc 2', $category->description);
    }

    public function test_exception_name(): void
    {
        $this->expectException(EntityValidationException::class);

        $category = new Category(
            name: "C",
            description: "D",
        );
    }


}

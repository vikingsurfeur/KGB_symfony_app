<?php

namespace App\Tests;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $admin = new Admin();
        $datetime = new \DateTime();

        $admin->setLastName('Doe')
            ->setFirstName('John')
            ->setEmail('j.doe@example.com')
            ->setPassword('password')
            ->setCreatedAt($datetime);

        $this->assertTrue($admin->getLastName() === 'Doe');
        $this->assertTrue($admin->getFirstName() === 'John');
        $this->assertTrue($admin->getEmail() === 'j.doe@example.com');
        $this->assertTrue($admin->getPassword() === 'password');
        $this->assertTrue($admin->getCreatedAt() === $datetime);
    }

    public function testIsFalse(): void
    {
        $admin = new Admin();
        $datetime = new \DateTime();

        $admin->setLastName('Doe')
            ->setFirstName('John')
            ->setEmail('j.doe@example.com')
            ->setPassword('password')
            ->setCreatedAt($datetime);

        $this->assertFalse($admin->getLastName() === 'eoD');
        $this->assertFalse($admin->getFirstName() === 'nhoJ');
        $this->assertFalse($admin->getEmail() === 'j.eod@example.com');
        $this->assertFalse($admin->getPassword() === 'passworded');
        $this->assertFalse($admin->getCreatedAt() === new \DateTime('2000-01-01'));
    }

    public function testIsEmpty(): void
    {
        $admin = new Admin();

        $this->assertEmpty($admin->getLastName());
        $this->assertEmpty($admin->getFirstName());
        $this->assertEmpty($admin->getEmail());
        $this->assertEmpty($admin->getPassword());
        $this->assertEmpty($admin->getCreatedAt());
    }
}

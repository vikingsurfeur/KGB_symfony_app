<?php

namespace App\Tests;

use App\Entity\Target;
use PHPUnit\Framework\TestCase;

class TargetUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $target = new Target();
        $datetime = new \DateTime();

        $target->setLastName('Doe')
            ->setFirstName('John')
            ->setDateOfBirth($datetime)
            ->setTargetCode(007)
            ->setNationality('FR');

        $this->assertTrue($target->getLastName() === 'Doe');
        $this->assertTrue($target->getFirstName() === 'John');
        $this->assertTrue($target->getDateOfBirth() === $datetime);
        $this->assertTrue($target->getTargetCode() === 007);
        $this->assertTrue($target->getNationality() === 'FR');

    }

    public function testIsFalse(): void
    {
        $target = new Target();
        $datetime = new \DateTime();

        $target->setLastName('Doe')
        ->setFirstName('John')
        ->setDateOfBirth($datetime)
        ->setTargetCode(007)
        ->setNationality('FR');

        $this->assertFalse($target->getLastName() === 'eoD');
        $this->assertFalse($target->getFirstName() === 'nhoJ');
        $this->assertFalse($target->getDateOfBirth() === new \DateTime('1980-01-02'));
        $this->assertFalse($target->getTargetCode() === 700);
        $this->assertFalse($target->getNationality() === 'US');
    }

    public function testIsEmpty(): void
    {
        $target = new Target();

        $this->assertEmpty($target->getLastName());
        $this->assertEmpty($target->getFirstName());
        $this->assertEmpty($target->getDateOfBirth());
        $this->assertEmpty($target->getTargetCode());
        $this->assertEmpty($target->getNationality());
    }
}

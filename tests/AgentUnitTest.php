<?php

namespace App\Tests;

use App\Entity\Agent;
use PHPUnit\Framework\TestCase;

class AgentUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $agent = new Agent();
        $datetime = new \DateTime();

        $agent->setLastName('Doe')
            ->setFirstName('John')
            ->setDateOfBirth($datetime)
            ->setAgentCode(007)
            ->setNationality('FR');

        $this->assertTrue($agent->getLastName() === 'Doe');
        $this->assertTrue($agent->getFirstName() === 'John');
        $this->assertTrue($agent->getDateOfBirth() === $datetime);
        $this->assertTrue($agent->getAgentCode() === 007);
        $this->assertTrue($agent->getNationality() === 'FR');
    }

    public function testIsFalse(): void
    {
        $agent = new Agent();
        $datetime = new \DateTime();

        $agent->setLastName('Doe')
            ->setFirstName('John')
            ->setDateOfBirth($datetime)
            ->setAgentCode(007)
            ->setNationality('FR');

        $this->assertFalse($agent->getLastName() === 'eoD');
        $this->assertFalse($agent->getFirstName() === 'nhoJ');
        $this->assertFalse($agent->getDateOfBirth() === new \DateTime('1980-01-02'));
        $this->assertFalse($agent->getAgentCode() === 700);
        $this->assertFalse($agent->getNationality() === 'US');
    }

    public function testIsEmpty(): void
    {
        $agent = new Agent();

        $this->assertEmpty($agent->getLastName());
        $this->assertEmpty($agent->getFirstName());
        $this->assertEmpty($agent->getDateOfBirth());
        $this->assertEmpty($agent->getAgentCode());
        $this->assertEmpty($agent->getNationality());
    }
}

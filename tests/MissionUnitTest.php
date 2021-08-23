<?php

namespace App\Tests;

use App\Entity\Mission;
use PHPUnit\Framework\TestCase;

class MissionUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $mission = new Mission();
        $datetime = new \DateTime();

        $mission->setTitle('title')
                ->setDescription('description')
                ->setCountry('FR')
                ->setMissionCode(007)
                ->setType('kill')
                ->setStatus('done')
                ->setSkillRequirement('kill')
                ->setStartDate($datetime)
                ->setEndDate($datetime);
        
        $this->assertTrue($mission->getTitle() === 'title');
        $this->assertTrue($mission->getDescription() === 'description');
        $this->assertTrue($mission->getCountry() === 'FR');
        $this->assertTrue($mission->getMissionCode() === 007);
        $this->assertTrue($mission->getType() === 'kill');
        $this->assertTrue($mission->getStatus() === 'done');
        $this->assertTrue($mission->getSkillRequirement() === 'kill');
        $this->assertTrue($mission->getStartDate() === $datetime);
        $this->assertTrue($mission->getEndDate() === $datetime);
    }

    public function testIsFalse(): void
    {
        $mission = new Mission();
        $datetime = new \DateTime();

        $mission->setTitle('title')
                ->setDescription('description')
                ->setCountry('FR')
                ->setMissionCode(007)
                ->setType('kill')
                ->setStatus('done')
                ->setSkillRequirement('kill')
                ->setStartDate($datetime)
                ->setEndDate($datetime);

        $this->assertFalse($mission->getTitle() === 'titled');
        $this->assertFalse($mission->getDescription() === 'descripted');
        $this->assertFalse($mission->getCountry() === 'RU');
        $this->assertFalse($mission->getMissionCode() === 700);
        $this->assertFalse($mission->getType() === 'killed');
        $this->assertFalse($mission->getStatus() === 'doner');
        $this->assertFalse($mission->getSkillRequirement() === 'killed');
        $this->assertFalse($mission->getStartDate() === new \DateTime('2001-01-01'));
        $this->assertFalse($mission->getEndDate() === new \DateTime('2001-01-01'));
    }

    public function testIsEmpty(): void
    {
        $mission = new Mission();

        $this->assertEmpty($mission->getTitle());
        $this->assertEmpty($mission->getDescription());
        $this->assertEmpty($mission->getCountry());
        $this->assertEmpty($mission->getMissionCode());
        $this->assertEmpty($mission->getType());
        $this->assertEmpty($mission->getStatus());
        $this->assertEmpty($mission->getSkillRequirement());
        $this->assertEmpty($mission->getStartDate());
        $this->assertEmpty($mission->getEndDate());
    }
}

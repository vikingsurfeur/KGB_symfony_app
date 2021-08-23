<?php

namespace App\Tests;

use App\Entity\Skill;
use PHPUnit\Framework\TestCase;

class SkillUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $skill = new Skill();

        $skill->setTitle('kill');

        $this->assertTrue($skill->getTitle() === 'kill');
    }

    public function testIsFalse(): void
    {
        $skill = new Skill();

        $skill->setTitle('kill');

        $this->assertFalse($skill->getTitle() === 'bind');
    }

    public function testIsEmpty(): void
    {
        $skill = new Skill();

        $this->assertEmpty($skill->getTitle());
    }
}

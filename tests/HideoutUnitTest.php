<?php

namespace App\Tests;

use App\Entity\Hideout;
use PHPUnit\Framework\TestCase;

class HideoutUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $hideout = new Hideout();

        $hideout->setAddress('Moscow')
                ->setCountry('RU')
                ->setType('hideout')
                ->setHideoutCode(007);

        $this->assertTrue($hideout->getAddress() === 'Moscow');
        $this->assertTrue($hideout->getCountry() === 'RU');
        $this->assertTrue($hideout->getType() === 'hideout');
        $this->assertTrue($hideout->getHideoutCode() === 007);
    }

    public function testIsFalse(): void
    {
        $hideout = new Hideout();

        $hideout->setAddress('Moscow')
                ->setCountry('RU')
                ->setType('hideout')
                ->setHideoutCode(007);

        $this->assertFalse($hideout->getAddress() === 'Minsk');
        $this->assertFalse($hideout->getCountry() === 'BU');
        $this->assertFalse($hideout->getType() === 'room');
        $this->assertFalse($hideout->getHideoutCode() === 700);
    }

    public function testIsEmpty(): void
    {
        $hideout = new Hideout();

        $this->assertEmpty($hideout->getAddress());
        $this->assertEmpty($hideout->getCountry());
        $this->assertEmpty($hideout->getType());
        $this->assertEmpty($hideout->getHideoutCode());
    }
}

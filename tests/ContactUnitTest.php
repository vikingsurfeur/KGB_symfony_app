<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contact = new Contact();
        $datetime = new \DateTime();

        $contact->setFirstName('John')
                ->setLastName('Doe')
                ->setDateOfBirth($datetime)
                ->setContactCode(007)
                ->setNationality('FR');

        $this->assertTrue($contact->getFirstName() === 'John');
        $this->assertTrue($contact->getLastName() === 'Doe');
        $this->assertTrue($contact->getDateOfBirth() === $datetime);
        $this->assertTrue($contact->getContactCode() === 007);
        $this->assertTrue($contact->getNationality() === 'FR');
    }

    public function testIsFalse(): void
    {
        $contact = new Contact();
        $datetime = new \DateTime();

        $contact->setFirstName('John')
                ->setLastName('Doe')
                ->setDateOfBirth($datetime)
                ->setContactCode(007)
                ->setNationality('FR');

        $this->assertFalse($contact->getFirstName() === 'nhoJ');
        $this->assertFalse($contact->getLastName() === 'eoD');
        $this->assertFalse($contact->getDateOfBirth() === new \DateTime('1980-01-02'));
        $this->assertFalse($contact->getContactCode() === 700);
        $this->assertFalse($contact->getNationality() === 'US');
    }

    public function testIsEmpty(): void
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getFirstName());
        $this->assertEmpty($contact->getLastName());
        $this->assertEmpty($contact->getDateOfBirth());
        $this->assertEmpty($contact->getContactCode());
        $this->assertEmpty($contact->getNationality());
    }
}

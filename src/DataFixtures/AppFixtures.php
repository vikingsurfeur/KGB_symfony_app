<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Mission;
use App\Entity\Hideout;
use App\Entity\Target;
use App\Entity\Contact;
use App\Entity\Skill;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        // Use Faker
        $faker = Factory::create('fr_FR');

        // Create User
        $user = new User();

        // Set User properties
        $user->setEmail('user@example.com')
            ->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setCreatedAt($faker->dateTimeBetween('-6 months'))
            ->setPassword($this->passwordHasher->hashPassword($user, 'password'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        // Create 9 Missions
        for ($i = 0; $i < 9; $i++) {
            $mission = new Mission();

            // Set Mission properties
            $mission->setTitle($faker->sentence(3))
                    ->setDescription($faker->paragraph(3))
                    ->setStartDate($faker->dateTimeBetween('-6 months'))
                    ->setEndDate($faker->dateTimeBetween('-6 months'))
                    ->setSkillRequirement($faker->randomElement(['kill', 'defend', 'assist']))
                    ->setMissionCode($faker->randomNumber(3))
                    ->setType('search and kill')
                    ->setStatus('open')
                    ->setCountry('FR')
                    ->setUser($user);

            $manager->persist($mission);
        }

        // Create 3 agents
        for ($j = 0; $j < 3; $j++) {
            $agent = new Agent();

            // Set Agent properties
            $agent->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setDateOfBirth($faker->dateTimeBetween('-6 months'))
                ->setNationality('FR')
                ->setAgentCode($faker->randomNumber(3))
                ->setMission($mission);

            $manager->persist($agent);
        }

        // Create 3 hideout
        for ($k = 0; $k < 3; $k++) {
            $hideout = new Hideout();

            // Set Hideout properties
            $hideout->setAddress($faker->address)
                    ->setCountry('FR')
                    ->setType('studio')
                    ->setHideoutCode($faker->randomNumber(3))
                    ->setMission($mission);

            $manager->persist($hideout);
        }

        // Create 3 target
        for ($l = 0; $l < 3; $l++) {
            $target = new Target();

            // Set Target properties
            $target->setLastname($faker->lastName())
                   ->setFirstname($faker->firstName())
                   ->setDateOfBirth($faker->dateTimeBetween('-6 months'))
                   ->setNationality('FR')
                   ->setTargetCode($faker->randomNumber(3))
                   ->setMission($mission);
            
            $manager->persist($target);
        }

        // Create 3 contact
        for ($m = 0; $m < 3; $m++) {
            $contact = new Contact();

            // Set Contact properties
            $contact->setFirstname($faker->firstName())
                    ->setLastname($faker->lastName())
                    ->setDateOfBirth($faker->dateTimeBetween('-6 months'))
                    ->setNationality('FR')
                    ->setContactCode($faker->randomNumber(3))
                    ->setMission($mission);
            
            $manager->persist($contact);
        }

        // Create 10 skill
        for ($n = 0; $n < 10; $n++) {
            $skill = new Skill();

            // Set Skill properties
            $skill->setTitle($faker->randomElement(['kill', 'defend', 'assist', 'spy', 'seek']))
                ->setAgent($agent);

            $manager->persist($skill);
        }       
        
        $manager->flush();
    }
}

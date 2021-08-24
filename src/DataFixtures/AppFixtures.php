<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Mission;
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
            ->setPassword($this->passwordHasher->hashPassword($user, 'password'));

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
        
        $manager->flush();
    }
}

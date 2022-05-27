<?php

namespace App\DataFixtures;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher)
   
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('admin');

        //$user->setPassword($this->hasher->hashPassword($user, 'azerty'));
        $user->setPassword('azerty');
       
        $manager->persist($user);
        $manager->flush();
    }
}

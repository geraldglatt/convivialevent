<?php

namespace App\DataFixtures;

use App\Entity\Admin;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $admin->setUsername('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->hasher->hashPassword($admin, 'azerty'));
        $manager->persist($admin);
        $manager->flush();
    }
}

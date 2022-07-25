<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setFullName('francis Dupuis');
        $contact->setEmail('test@test.fr');
        $contact->setPhone('0629057612');
        $contact->setEventDate(new \DateTime(date('Y-m-d')));
        $contact->setAdultGuest(85);
        $contact->setChildGuest(12);
        $contact->setMessage('Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book.');
        $contact->setBrunch(true);
        $manager->persist($contact);
       
        $manager->flush();
    }

}

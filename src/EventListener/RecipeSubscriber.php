<?php

namespace App\EventListener;

use App\Entity\Recipe;
use Doctrine\ORM\Events;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;

class RecipeSubscriber implements EventSubscriberInterface 
{
    public function __construct(private EntityManagerInterface $em)
    {   
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        if(!$args->getObject() instanceof Recipe) {
            return;
        }

        $recipe = $args->getObject();
        $recipe->setSlug((new AsciiSlugger())->slug($recipe->getTitle())->lower());
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }
}
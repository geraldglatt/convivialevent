<?php

namespace App\EventListener;

use App\Entity\Page;
use Doctrine\ORM\Events;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;

class PageSubscriber implements EventSubscriberInterface 
{
    public function __construct(private EntityManagerInterface $em)
    {   
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        if(!$args->getObject() instanceof Page) {
            return;
        }

        $page = $args->getObject();
        $page->setSlug((new AsciiSlugger())->slug($page->getTitle())->lower());
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }
}
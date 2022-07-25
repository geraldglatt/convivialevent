<?php

namespace App\Tests\Unit;

use App\Entity\Page;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PageTest extends KernelTestCase
{
    public function getEntity(): Page
    {
        return (new Page())->setSlug('Page #1')
            ->setTitle('Page #1')
            ->setContent('Content #1')
            ->setMetaDesc('MetaDesc #1')
            ->setImage('Image #1');
    }

    public function testEntityIsValid(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $page = $this->getEntity();
       

        $errors = $container->get('validator')->validate($page);

        $this->assertCount(0, $errors);   
    }

    public function testInvalidSlug()
    {
        self::bootKernel();

        $container = static::getContainer();

        $page = $this->getEntity();
        $page->setSlug('');

        $errors = $container->get('validator')->validate($page);

        $this->assertCount(2, $errors);   
    }
}

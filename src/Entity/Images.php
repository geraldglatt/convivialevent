<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImagesRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
#[Vich\Uploadable]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[Vich\UploadableField(mapping:"convivialevent_images", fileNameProperty:"image")]
    private $imageFile;

    #[ORM\Column(type: 'integer')]
    private $position;

    #[ORM\ManyToOne(targetEntity: Page::class, inversedBy: 'page')]
    #[ORM\JoinColumn(nullable: false)]
    private $page;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImageFile(): ?file
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }
}

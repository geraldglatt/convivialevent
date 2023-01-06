<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: PageRepository::class)]
#[Vich\Uploadable]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex(pattern: "/^[a-z0-9\-]+$/")]
    private $slug;

    #[ORM\Column(type: 'string', length: 120)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'text')]
    private $metaDesc;

    #[ORM\Column(type: 'string', length: 255)]
    private $file;

    #[Vich\UploadableField(mapping:'page_images', fileNameProperty:'file')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: PagePdf::class, orphanRemoval: true, cascade: [ "persist" ])]
    private $pagePdfs;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: Images::class, orphanRemoval: true, cascade: [ "persist" ])]
    private $pageImages;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: HomeBlock::class, orphanRemoval: true, cascade: [ "persist" ])]
    private $homeBlocks;

    public function __construct()
    {
        $this->pagePdfs = new ArrayCollection();
        $this->pageImages = new ArrayCollection();
        $this->homeBlocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getMetaDesc(): ?string
    {
        return $this->metaDesc;
    }

    public function setMetaDesc(string $metaDesc): self
    {
        $this->metaDesc = $metaDesc;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getImageFile(): ?Image
    {
        return $this->imageFile;
    }

    public function setImageFile(?Image $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        
        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, PagePdf>
     */
    public function getPagePdfs(): Collection
    {
        return $this->pagePdfs;
    }

    public function addPagePdf(PagePdf $pagePdf): self
    {
        if (!$this->pagePdfs->contains($pagePdf)) {
            $this->pagePdfs[] = $pagePdf;
            $pagePdf->setPage($this);
        }

        return $this;
    }

    public function removePagePdf(PagePdf $pagePdf): self
    {
        if ($this->pagePdfs->removeElement($pagePdf)) {
            // set the owning side to null (unless already changed)
            if ($pagePdf->getPage() === $this) {
                $pagePdf->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getPageImages(): Collection
    {
        return $this->pageImages;
    }

    public function addPageImage(Images $pageImage): self
    {
        if (!$this->pageImages->contains($pageImage)) {
            $this->pageImages[] = $pageImage;
            $pageImage->setPage($this);
        }

        return $this;
    }

    public function removePageImage(Images $pageImage): self
    {
        if ($this->pageImages->removeElement($pageImage)) {
            // set the owning side to null (unless already changed)
            if ($pageImage->getPage() === $this) {
                $pageImage->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HomeBlock>
     */
    public function getHomeBlocks(): Collection
    {
        return $this->homeBlocks;
    }

    public function addHomeBlock(HomeBlock $homeBlock ): self
    {
        if (!$this->homeBlocks->contains($homeBlock)) {
            $this->homeBlocks[] = $homeBlock;
            $homeBlock->setPage($this);
        }

        return $this;
    }

    public function removeHomeBlock(HomeBlock $homeBlock): self
    {
        if ($this->homeBlocks->removeElement($homeBlock)) {
            // set the owning side to null (unless already changed)
            if ($homeBlock->getPage() === $this) {
                $homeBlock->setPage(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

}

<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Regex(pattern: "/^[a-z0-9\-]+$/")]
    private $slug;

    #[ORM\Column(type: 'string', length: 60)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'text')]
    private $metaDesc;

    #[ORM\Column(type: 'string', length: 60, nullable: true)]
    private $image;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
        if ($this->page->removeElement($homeBlock)) {
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

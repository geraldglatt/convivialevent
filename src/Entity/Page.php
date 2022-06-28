<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'string', length: 60)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'text')]
    private $metaDesc;

    #[ORM\Column(type: 'string', length: 60, nullable: true)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: PagePdf::class, orphanRemoval: true)]
    private $pagePdfs;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: Images::class)]
    private $page;

    #[ORM\OneToMany(mappedBy: 'page', targetEntity: HomeBlock::class)]
    private $pages;

    public function __construct()
    {
        $this->pagePdfs = new ArrayCollection();
        $this->page = new ArrayCollection();
        $this->pages = new ArrayCollection();
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
    public function getPage(): Collection
    {
        return $this->page;
    }

    public function addPage(Images $page): self
    {
        if (!$this->page->contains($page)) {
            $this->page[] = $page;
            $page->setPage($this);
        }

        return $this;
    }

    public function removePage(Images $page): self
    {
        if ($this->page->removeElement($page)) {
            // set the owning side to null (unless already changed)
            if ($page->getPage() === $this) {
                $page->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HomeBlock>
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function __toString()
    {
        return $this->title;
    }
}

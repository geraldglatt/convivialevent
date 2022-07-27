<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\Length(min:2, max:50)]
    private ?string $fullName;

    #[ORM\Column(type: 'string', length: 180)]
    #[Assert\Email()]
    #[Assert\Length(min:2, max:180)]
    private ?string $email;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    #[Assert\Length(min:2, max:15)]
    private ?string $phone;

    #[ORM\Column(type: 'datetime')]
    private ?DateTime $eventDate;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $AdultGuest;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $childGuest;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank()]
    private ?string $message;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $brunch;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEventDate(): ?DateTime
    {
        return $this->eventDate;
    }

    public function setEventDate(DateTime $eventDate): self
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getAdultGuest(): ?int
    {
        return $this->AdultGuest;
    }

    public function setAdultGuest(?int $AdultGuest): self
    {
        $this->AdultGuest = $AdultGuest;

        return $this;
    }

    public function getChildGuest(): ?int
    {
        return $this->childGuest;
    }

    public function setChildGuest(?int $childGuest): self
    {
        $this->childGuest = $childGuest;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function isBrunch(): ?bool
    {
        return $this->brunch;
    }

    public function setBrunch(bool $brunch): self
    {
        $this->brunch = $brunch;

        return $this;
    }
}

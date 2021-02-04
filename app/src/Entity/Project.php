<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $original_author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $original_language;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $original_file;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity=File::class)
     */
    private $traductions;

    public function __construct()
    {
        $this->traductions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOriginalAuthor(): ?string
    {
        return $this->original_author;
    }

    public function setOriginalAuthor(?string $original_author): self
    {
        $this->original_author = $original_author;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->original_language;
    }

    public function setOriginalLanguage(string $original_language): self
    {
        $this->original_language = $original_language;

        return $this;
    }

    public function getOriginalFile(): ?Language
    {
        return $this->original_file;
    }

    public function setOriginalFile(?Language $original_file): self
    {
        $this->original_file = $original_file;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getTraductions(): Collection
    {
        return $this->traductions;
    }

    public function addTraduction(File $traduction): self
    {
        if (!$this->traductions->contains($traduction)) {
            $this->traductions[] = $traduction;
        }

        return $this;
    }

    public function removeTraduction(File $traduction): self
    {
        $this->traductions->removeElement($traduction);

        return $this;
    }
}

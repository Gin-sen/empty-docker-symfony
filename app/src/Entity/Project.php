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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;


    /**
     * @ORM\ManyToMany(targetEntity=File::class, inversedBy="")
     */
    private $traductions;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="contributions")
     */
    private $contributors;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, inversedBy="translated_projects")
     */
    private $languages;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="original_projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $original_language;

    public function __construct()
    {
        $this->traductions = new ArrayCollection();
        $this->contributors = new ArrayCollection();
        $this->languages = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getContributors(): Collection
    {
        return $this->contributors;
    }

    public function addContributor(User $contributor): self
    {
        if (!$this->contributors->contains($contributor)) {
            $this->contributors[] = $contributor;
        }

        return $this;
    }

    public function removeContributor(User $contributor): self
    {
        $this->contributors->removeElement($contributor);

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->languages->removeElement($language);

        return $this;
    }

    public function getOriginalLanguage(): ?Language
    {
        return $this->original_language;
    }

    public function setOriginalLanguage(?Language $original_language): self
    {
        $this->original_language = $original_language;

        return $this;
    }

}

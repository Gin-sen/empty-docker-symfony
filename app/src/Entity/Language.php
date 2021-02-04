<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $shortname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="languages")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=File::class, mappedBy="languages")
     */
    private $files;

    /**
     * @ORM\ManyToMany(targetEntity=Project::class, mappedBy="original_file")
     */
    private $projects;

    /**
     * @ORM\ManyToMany(targetEntity=Project::class, mappedBy="languages")
     */
    private $translated_projects;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="original_language")
     */
    private $original_projects;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->files = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->translated_projects = new ArrayCollection();
        $this->original_projects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortname(): ?string
    {
        return $this->shortname;
    }

    public function setShortname(string $shortname): self
    {
        $this->shortname = $shortname;

        return $this;
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addLanguage($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeLanguage($this);
        }

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setLanguage($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getLanguage() === $this) {
                $file->setLanguage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setOriginalFile($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getOriginalFile() === $this) {
                $project->setOriginalFile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getTranslatedProjects(): Collection
    {
        return $this->translated_projects;
    }

    public function addTranslatedProject(Project $translatedProject): self
    {
        if (!$this->translated_projects->contains($translatedProject)) {
            $this->translated_projects[] = $translatedProject;
            $translatedProject->addLanguage($this);
        }

        return $this;
    }

    public function removeTranslatedProject(Project $translatedProject): self
    {
        if ($this->translated_projects->removeElement($translatedProject)) {
            $translatedProject->removeLanguage($this);
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getOriginalProjects(): Collection
    {
        return $this->original_projects;
    }

    public function addOriginalProject(Project $originalProject): self
    {
        if (!$this->original_projects->contains($originalProject)) {
            $this->original_projects[] = $originalProject;
            $originalProject->setOriginalLanguage($this);
        }

        return $this;
    }

    public function removeOriginalProject(Project $originalProject): self
    {
        if ($this->original_projects->removeElement($originalProject)) {
            // set the owning side to null (unless already changed)
            if ($originalProject->getOriginalLanguage() === $this) {
                $originalProject->setOriginalLanguage(null);
            }
        }

        return $this;
    }
}

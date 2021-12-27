<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $class;

    #[ORM\Column(type: 'integer')]
    private $duration;

    #[ORM\ManyToMany(targetEntity: StudentClass::class, inversedBy: 'courses')]
    private $studentclasses;

    public function __construct()
    {
        $this->studentclasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection|StudentClass[]
     */
    public function getStudentclasses(): Collection
    {
        return $this->studentclasses;
    }

    public function addStudentclass(StudentClass $studentclass): self
    {
        if (!$this->studentclasses->contains($studentclass)) {
            $this->studentclasses[] = $studentclass;
        }

        return $this;
    }

    public function removeStudentclass(StudentClass $studentclass): self
    {
        $this->studentclasses->removeElement($studentclass);

        return $this;
    }
}

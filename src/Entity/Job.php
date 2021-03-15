<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
    private $TitreJob;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\ManyToMany(targetEntity=JobCategory::class, mappedBy="Job")
     */
    private $jobCategories;

    public function __construct()
    {
        $this->jobCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreJob(): ?string
    {
        return $this->TitreJob;
    }

    public function setTitreJob(string $TitreJob): self
    {
        $this->TitreJob = $TitreJob;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|JobCategory[]
     */
    public function getJobCategories(): Collection
    {
        return $this->jobCategories;
    }

    public function addJobCategory(JobCategory $jobCategory): self
    {
        if (!$this->jobCategories->contains($jobCategory)) {
            $this->jobCategories[] = $jobCategory;
            $jobCategory->addJob($this);
        }

        return $this;
    }

    public function removeJobCategory(JobCategory $jobCategory): self
    {
        if ($this->jobCategories->removeElement($jobCategory)) {
            $jobCategory->removeJob($this);
        }

        return $this;
    }
}

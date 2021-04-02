<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CvFormRepository::class)
 * 
 */
class CvForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("Cv:ecrire")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups("Cv:ecrire")
     */
    private $Profile;


    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="cvForm", cascade={"persist", "remove"})
     * @Groups("Cv:ecrire")
     */
    private $Experiences;

    /**
     * @ORM\OneToMany(targetEntity=Competences::class, mappedBy="cvForm")
     * @Groups("Cv:ecrire")
     */
    private $Competences;

    /**
     * @ORM\OneToMany(targetEntity=Langue::class, mappedBy="cvForm", cascade={"persist", "remove"})
     * @Groups("Cv:ecrire")
     */
    private $Langue;

    /**
     * @ORM\OneToMany(targetEntity=Formations::class, mappedBy="cvForm", cascade={"persist", "remove"})
     */
    private $Formations;

    /**
     * @ORM\OneToMany(targetEntity=Educations::class, mappedBy="cvForm", cascade={"persist", "remove"})
     */
    private $Educations;

    /**
     * @ORM\OneToOne(targetEntity=Candidate::class, inversedBy="cvForm", cascade={"persist", "remove"})
     */
    private $Candidat;


    public function __construct()
    {
        $this->Educations = new ArrayCollection();
        $this->Experiences = new ArrayCollection();
        $this->Competences = new ArrayCollection();
        $this->Langue = new ArrayCollection();
        $this->Formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfile(): ?string
    {
        return $this->Profile;
    }

    public function setProfile(string $Profile): self
    {
        $this->Profile = $Profile;

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->Experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->Experiences->contains($experience)) {
            $this->Experiences[] = $experience;
            $experience->setCvForm($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->Experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCvForm() === $this) {
                $experience->setCvForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competences[]
     */
    public function getCompetences(): Collection
    {
        return $this->Competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->Competences->contains($competence)) {
            $this->Competences[] = $competence;
            $competence->setCvForm($this);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        if ($this->Competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getCvForm() === $this) {
                $competence->setCvForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangue(): Collection
    {
        return $this->Langue;
    }

    public function addLangue(Langue $langue): self
    {
        if (!$this->Langue->contains($langue)) {
            $this->Langue[] = $langue;
            $langue->setCvForm($this);
        }

        return $this;
    }

    public function removeLangue(Langue $langue): self
    {
        if ($this->Langue->removeElement($langue)) {
            // set the owning side to null (unless already changed)
            if ($langue->getCvForm() === $this) {
                $langue->setCvForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formations[]
     */
    public function getFormations(): Collection
    {
        return $this->Formations;
    }

    public function addFormation(Formations $formation): self
    {
        if (!$this->Formations->contains($formation)) {
            $this->Formations[] = $formation;
            $formation->setCvForm($this);
        }

        return $this;
    }

    public function removeFormation(Formations $formation): self
    {
        if ($this->Formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getCvForm() === $this) {
                $formation->setCvForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Educations[]
     */
    public function getEducations(): Collection
    {
        return $this->Educations;
    }

    public function addEducation(Educations $education): self
    {
        if (!$this->Educations->contains($education)) {
            $this->Educations[] = $education;
            $education->setCvForm($this);
        }

        return $this;
    }

    public function removeEducation(Educations $education): self
    {
        if ($this->Educations->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getCvForm() === $this) {
                $education->setCvForm(null);
            }
        }

        return $this;
    }

    public function getCandidat(): ?Candidate
    {
        return $this->Candidat;
    }

    public function setCandidat(?Candidate $Candidat): self
    {
        $this->Candidat = $Candidat;

        return $this;
    }
}

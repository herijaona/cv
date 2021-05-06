<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetencesRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CompetencesRepository::class)
 */
class Competences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("Cv:ecrire")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Cv:ecrire")
     */
    private $Competence;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Cv:ecrire")
     */
    private $Niveau;

    /**
     * @ORM\ManyToOne(targetEntity=CvForm::class, inversedBy="Competences", cascade={"persist"})
     */
    private $cvForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCvForm(): ?CvForm
    {
        return $this->cvForm;
    }

    public function setCvForm(?CvForm $cvForm): self
    {
        $this->cvForm = $cvForm;

        return $this;
    }

    /**
     * Get the value of Competence
     */ 
    public function getCompetence()
    {
        return $this->Competence;
    }

    /**
     * Set the value of Competence
     *
     * @return  self
     */ 
    public function setCompetence($Competence)
    {
        $this->Competence = $Competence;

        return $this;
    }

    /**
     * Get the value of Niveau
     */ 
    public function getNiveau()
    {
        return $this->Niveau;
    }

    /**
     * Set the value of Niveau
     *
     * @return  self
     */ 
    public function setNiveau($Niveau)
    {
        $this->Niveau = $Niveau;

        return $this;
    }
}

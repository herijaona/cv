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
    private $TitreDeCompetence;

    /**
     * @ORM\Column(type="integer")
     * @Groups("Cv:ecrire")
     */
    private $ValeurPorcentage;

    /**
     * @ORM\ManyToOne(targetEntity=CvForm::class, inversedBy="Competences", cascade={"persist"})
     */
    private $cvForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreDeCompetence(): ?string
    {
        return $this->TitreDeCompetence;
    }

    public function setTitreDeCompetence(string $TitreDeCompetence): self
    {
        $this->TitreDeCompetence = $TitreDeCompetence;

        return $this;
    }

    public function getValeurPorcentage(): ?int
    {
        return $this->ValeurPorcentage;
    }

    public function setValeurPorcentage(int $ValeurPorcentage): self
    {
        $this->ValeurPorcentage = $ValeurPorcentage;

        return $this;
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
}

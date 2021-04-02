<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EducationsRepository;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * 
 * @ORM\Entity(repositoryClass=EducationsRepository::class)
 */
class Educations
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Cv:ecrire")
     */
    private $NomEcole;

    /**
     * @ORM\Column(type="date")
     * @Groups("Cv:ecrire")
     */
    private $DateDeDebut;

    /**
     * @ORM\Column(type="date")
     * @Groups("Cv:ecrire")
     */
    private $DateDeFin;

    /**
     * @ORM\Column(type="text")
     * @Groups("Cv:ecrire")
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=CvForm::class, inversedBy="Educations", cascade={"persist"})
     */
    private $cvForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNomEcole(): ?string
    {
        return $this->NomEcole;
    }

    public function setNomEcole(string $NomEcole): self
    {
        $this->NomEcole = $NomEcole;

        return $this;
    }

    public function getDateDeDebut(): ?\DateTimeInterface
    {
        return $this->DateDeDebut;
    }

    public function setDateDeDebut(\DateTimeInterface $DateDeDebut): self
    {
        $this->DateDeDebut = $DateDeDebut;

        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->DateDeFin;
    }

    public function setDateDeFin(\DateTimeInterface $DateDeFin): self
    {
        $this->DateDeFin = $DateDeFin;

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

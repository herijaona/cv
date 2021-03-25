<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationsRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FormationsRepository::class)
 */
class Formations
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
    private $Formation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Cv:ecrire")
     */
    private $Etablissement;


    /**
     * @ORM\Column(type="date")
     * @Groups("Cv:ecrire")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="date")
     * @Groups("Cv:ecrire")
     */
    private $DateFin;

    /**
     * @ORM\ManyToOne(targetEntity=CvForm::class, inversedBy="Formations", cascade={"persist"})
     */
    private $cvForm;

    /**
     * @ORM\Column(type="text")
     */
    private $Descirption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?string
    {
        return $this->Formation;
    }

    public function setFormation(string $Formation): self
    {
        $this->Formation = $Formation;

        return $this;
    }

    public function getEtablissement(): ?string
    {
        return $this->Etablissement;
    }

    public function setEtablissement(string $Etablissement): self
    {
        $this->Etablissement = $Etablissement;

        return $this;
    }


    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

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

    public function getDescirption(): ?string
    {
        return $this->Descirption;
    }

    public function setDescirption(string $Descirption): self
    {
        $this->Descirption = $Descirption;

        return $this;
    }
}

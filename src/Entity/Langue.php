<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LangueRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * 
 * @ORM\Entity(repositoryClass=LangueRepository::class)
 */
class Langue
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
    private $Langue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("Cv:ecrire")
     */
    private $Niveau;

    /**
     * @ORM\ManyToOne(targetEntity=CvForm::class, inversedBy="Langue", cascade={"persist"})
     * @Groups("Cv:ecrire")
     */
    private $cvForm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangue(): ?string
    {
        return $this->Langue;
    }

    public function setLangue(string $Langue): self
    {
        $this->Langue = $Langue;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->Niveau;
    }

    public function setNiveau(string $Niveau): self
    {
        $this->Niveau = $Niveau;

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

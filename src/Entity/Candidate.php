<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidateRepository::class)
 * 
 */
class Candidate
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\OneToOne(targetEntity=CvForm::class, cascade={"persist", "remove"})
     */
    private $CurriculumVitae;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Apropos;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->DateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $DateDeNaissance): self
    {
        $this->DateDeNaissance = $DateDeNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCurriculumVitae(): ?CvForm
    {
        return $this->CurriculumVitae;
    }

    public function setCurriculumVitae(?CvForm $CurriculumVitae): self
    {
        $this->CurriculumVitae = $CurriculumVitae;

        return $this;
    }

    public function getApropos(): ?string
    {
        return $this->Apropos;
    }

    public function setApropos(string $Apropos): self
    {
        $this->Apropos = $Apropos;

        return $this;
    }
}

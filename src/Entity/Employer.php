<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployerRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=EmployerRepository::class)
 * @Vich\Uploadable
 */
class Employer
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDeNaissance;


    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;


    /**
     * Undocumented variable
     *
     * @var String|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Avatar;

    /**
     * Undocumented variable
     *
     * @var File|null
     * @Vich\UploadableField(mapping="employeur", fileNameProperty="Avatar")
     */
    private $imageFile;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Apropos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poste;


    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="employer")
     */
    private $Jobs;

    /**
     * @ORM\OneToOne(targetEntity=Societe::class, mappedBy="Employeur", cascade={"persist", "remove"})
     */
    private $societe;


    public function __construct()
    {
        $this->Societe = new ArrayCollection();
        $this->Jobs = new ArrayCollection();
    }

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

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

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


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->DateDeNaissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $DateDeNaissance): self
    {
        $this->DateDeNaissance = $DateDeNaissance;

        return $this;
    }

    public function getApropos(): ?string
    {
        return $this->Apropos;
    }

    public function setApropos(?string $Apropos): self
    {
        $this->Apropos = $Apropos;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  String|null
     */
    public function getAvatar()
    {
        return $this->Avatar;
    }

    /**
     * Set undocumented variable
     *
     * @param  String|null  $Avatar  Undocumented variable
     *
     * @return  self
     */
    public function setAvatar($Avatar)
    {
        $this->Avatar = $Avatar;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set undocumented variable
     *
     * @param  File|null  $imageFile  Undocumented variable
     *
     * @return  self
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->UpdateAt = new \DateTime('now');
        }

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }



    /**
     * @return Collection|Job[]
     */
    public function getJobs(): Collection
    {
        return $this->Jobs;
    }

    public function addJob(Job $job): self
    {
        if (!$this->Jobs->contains($job)) {
            $this->Jobs[] = $job;
            $job->setEmployer($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->Jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getEmployer() === $this) {
                $job->setEmployer(null);
            }
        }

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        // unset the owning side of the relation if necessary
        if ($societe === null && $this->societe !== null) {
            $this->societe->setEmployeur(null);
        }

        // set the owning side of the relation if necessary
        if ($societe !== null && $societe->getEmployeur() !== $this) {
            $societe->setEmployeur($this);
        }

        $this->societe = $societe;

        return $this;
    }
}

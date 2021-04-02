<?php

namespace App\Entity;

use DateTime;
use App\Entity\CvForm;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CandidateRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * 
 * @ORM\Entity(repositoryClass=CandidateRepository::class)
 * @Vich\Uploadable
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
     * @Assert\NotBlank(message="La champs nom est vide")
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La champs prenom est vide")
     */
    private $Prenom;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     */
    private $Utilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La champs telephone est vide")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     */
    private $DateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La champs sexe est vide")
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La champs Adresse est vide")
     */
    private $Adresse;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Apropos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Poste;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Niveau;

    /**
     * @ORM\OneToOne(targetEntity=CvForm::class, mappedBy="Candidat", cascade={"persist", "remove"})
     */
    private $cvForm;

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
     * @Vich\UploadableField(mapping="candidats", fileNameProperty="Avatar")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdateAt;


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

    public function getApropos(): ?string
    {
        return $this->Apropos;
    }

    public function setApropos(string $Apropos): self
    {
        $this->Apropos = $Apropos;

        return $this;
    }

    public function getCvForm(): ?CvForm
    {
        return $this->cvForm;
    }

    public function setCvForm(?CvForm $cvForm): self
    {
        // unset the owning side of the relation if necessary
        if ($cvForm === null && $this->cvForm !== null) {
            $this->cvForm->setCandidat(null);
        }

        // set the owning side of the relation if necessary
        if ($cvForm !== null && $cvForm->getCandidat() !== $this) {
            $cvForm->setCandidat($this);
        }

        $this->cvForm = $cvForm;

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

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->UpdateAt;
    }

    public function setUpdateAt(\DateTimeInterface $UpdateAt): self
    {
        $this->UpdateAt = $UpdateAt;

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

    public function getNiveau(): ?string
    {
        return $this->Niveau;
    }

    public function setNiveau(string $Niveau): self
    {
        $this->Niveau = $Niveau;

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
}

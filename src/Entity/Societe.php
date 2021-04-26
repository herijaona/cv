<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SocieteRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 * @Vich\Uploadable
 */
class Societe
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
    private $nom;

    /**
     * Undocumented variable
     *
     * @var String|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Logo;

    /**
     * Undocumented variable
     *
     * @var File|null
     * @Vich\UploadableField(mapping="societe_logo", fileNameProperty="Logo")
     */
    private $imageFile;


    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdateAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SiteWeb;

    /**
     * @ORM\OneToOne(targetEntity=Employer::class, inversedBy="societe", cascade={"persist", "remove"})
     */
    private $Employeur;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    /**
     * Get undocumented variable
     *
     * @return  String|null
     */
    public function getLogo()
    {
        return $this->Logo;
    }

    /**
     * Set undocumented variable
     *
     * @param  String|null  $Logo  Undocumented variable
     *
     * @return  self
     */
    public function setLogo($Logo)
    {
        $this->Logo = $Logo;

        return $this;
    }

    /**
     * Get the value of UpdateAt
     */
    public function getUpdateAt()
    {
        return $this->UpdateAt;
    }

    /**
     * Set the value of UpdateAt
     *
     * @return  self
     */
    public function setUpdateAt($UpdateAt)
    {
        $this->UpdateAt = $UpdateAt;

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

    public function getSiteWeb(): ?string
    {
        return $this->SiteWeb;
    }

    public function setSiteWeb(string $SiteWeb): self
    {
        $this->SiteWeb = $SiteWeb;

        return $this;
    }

    public function getEmployeur(): ?Employer
    {
        return $this->Employeur;
    }

    public function setEmployeur(?Employer $Employeur): self
    {
        $this->Employeur = $Employeur;

        return $this;
    }
}

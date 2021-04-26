<?php

namespace App\Entity;

use App\Repository\CvImploadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CvImploadRepository::class)
 */
class CvImpload
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
    private $CurriculumVitae;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LettreMotivation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->CurriculumVitae;
    }

    public function setCurriculumVitae(string $CurriculumVitae): self
    {
        $this->CurriculumVitae = $CurriculumVitae;

        return $this;
    }

    public function getLettreMotivation(): ?string
    {
        return $this->LettreMotivation;
    }

    public function setLettreMotivation(string $LettreMotivation): self
    {
        $this->LettreMotivation = $LettreMotivation;

        return $this;
    }
}

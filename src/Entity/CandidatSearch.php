<?php

namespace App\Entity;

class CandidatSearch
{
    /**
     * Undocumented variable
     *
     * @var string|null
     */
    private $Poste;

    /**
     * Undocumented variable
     *
     * @var string|null
     */
    private $Niveau;

    /**
     * Get undocumented variable
     *
     * @return  string|null
     */
    public function getPoste()
    {
        return $this->Poste;
    }

    /**
     * Set undocumented variable
     *
     * @param  string|null  $Poste  Undocumented variable
     *
     * @return  self
     */
    public function setPoste($Poste)
    {
        $this->Poste = $Poste;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string|null
     */
    public function getNiveau()
    {
        return $this->Niveau;
    }

    /**
     * Set undocumented variable
     *
     * @param  string|null  $Niveau  Undocumented variable
     *
     * @return  self
     */
    public function setNiveau($Niveau)
    {
        $this->Niveau = $Niveau;

        return $this;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: pc esprit
 * Date: 13/11/2018
 * Time: 20:39
 */

namespace Location\AgenceBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ChauffeurController
 * @ORM\Entity()
 */

class Car
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string",length=255)
     */
    private $immatricule;
    /**
     * @ORM\Column(type="string",length=40)
     */
    private $marque;
    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;
    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;
    /**
     * @ORM\ManyToOne(targetEntity="Chauffeur")
     * @ORM\JoinColumn(referencedColumnName="cin")
     */
    private $Chauffeur;

    /**
     * @return mixed
     */
    public function getImmatricule()
    {
        return $this->immatricule;
    }

    /**
     * @param mixed $immatricule
     */
    public function setImmatricule($immatricule)
    {
        $this->immatricule = $immatricule;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getChauffeur()
    {
        return $this->Chauffeur;
    }

    /**
     * @param mixed $Chauffeur
     */
    public function setChauffeur($Chauffeur)
    {
        $this->Chauffeur = $Chauffeur;
    }

}
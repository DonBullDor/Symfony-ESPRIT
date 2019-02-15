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
class Chauffeur
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string",length=255)
     */
    private $cin;
    /**
     * @ORM\Column(type="string",length=40)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=40)
     */
    private $prenom;

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param mixed $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

}
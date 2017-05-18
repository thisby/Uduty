<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 3.0.3 (doctrine2-annotation) on 2017-05-08 01:05:58.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\Objet
 *
 * @ORM\Entity(repositoryClass="App\Repositories\Objet\EloquentObjetRepository")
 * @ORM\Table(name="objet")
 */
class Objet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $nom;

    /**
     * @ORM\Column(name="`desc`", type="string", length=255, nullable=true)
     */
    protected $desc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $countriesId;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $localPrix;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $image;

    /**
     * @ORM\OneToMany(targetEntity="Duty", mappedBy="objet")
     */
    protected $duties;

    public function __construct()
    {
        $this->duties = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\Objet
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     * @return \Entity\Objet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of desc.
     *
     * @param string $desc
     * @return \Entity\Objet
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of desc.
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of countriesId.
     *
     * @param integer $countriesId
     * @return \Entity\Objet
     */
    public function setCountriesId($countriesId)
    {
        $this->countriesId = $countriesId;

        return $this;
    }

    /**
     * Get the value of countriesId.
     *
     * @return integer
     */
    public function getCountriesId()
    {
        return $this->countriesId;
    }

    /**
     * Set the value of localPrix.
     *
     * @param string $localPrix
     * @return \Entity\Objet
     */
    public function setLocalPrix($localPrix)
    {
        $this->localPrix = $localPrix;

        return $this;
    }

    /**
     * Get the value of localPrix.
     *
     * @return string
     */
    public function getLocalPrix()
    {
        return $this->localPrix;
    }

    /**
     * Set the value of image.
     *
     * @param string $image
     * @return \Entity\Objet
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set Duty entity (one to one).
     *
     * @param \Entity\Duty $duty
     * @return \Entity\Objet
     */
    public function setDuty(Duty $duty = null)
    {
        $duty->setObjet($this);
        $this->duty = $duty;

        return $this;
    }

    /**
     * Get Duty entity (one to one).
     *
     * @return \Entity\Duty
     */
    public function getDuty()
    {
        return $this->duty;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'desc', 'countriesId', 'localPrix', 'image');
    }
}
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
 * Entity\Pays
 *
 * @ORM\Entity(repositoryClass="PaysRepository")
 * @ORM\Table(name="pays")
 */
class Pays
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
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    protected $nom_court;

    /**
     * @ORM\OneToOne(targetEntity="Trip", mappedBy="pays")
     */
    protected $trip;

    public function __construct()
    {
        $this->trips = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\Pays
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
     * @return \Entity\Pays
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
     * Set the value of nom_court.
     *
     * @param string $nom_court
     * @return \Entity\Pays
     */
    public function setNomCourt($nom_court)
    {
        $this->nom_court = $nom_court;

        return $this;
    }

    /**
     * Get the value of nom_court.
     *
     * @return string
     */
    public function getNomCourt()
    {
        return $this->nom_court;
    }

    /**
     * Set Trip entity (one to one).
     *
     * @param \Entity\Trip $trip
     * @return \Entity\Pay
     */
    public function setTrip(Trip $trip = null)
    {
        $trip->setPayss($this);
        $this->trip = $trip;

        return $this;
    }

    /**
     * Get Trip entity (one to one).
     *
     * @return \Entity\Trip
     */
    public function getTrip()
    {
        return $this->trip;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'nom_court');
    }
}
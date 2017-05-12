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
 * Entity\Duty
 *
 * @ORM\Entity(repositoryClass="App\Repositories\duty\DutyRepository")
 * @ORM\Table(name="duty", indexes={@ORM\Index(name="fk_duty_objet1_idx", columns={"objet_id"})})
 */
class Duty
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $contenu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $pays_list;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $is_free;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $prix_minimum;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $prix_maximum;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $ultimatum_date;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $image;

    /**
     * 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $user_id;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $objet_id;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="duty")
     */
    protected $user;

    /**
     * @ORM\OneToOne(targetEntity="Objet", inversedBy="duty")
     * @ORM\JoinColumn(name="objet_id", referencedColumnName="id", nullable=false)
     */
    protected $objet;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\Duty
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
     * Set the value of contenu.
     *
     * @param string $contenu
     * @return \Entity\Duty
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of contenu.
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of pays_list.
     *
     * @param string $pays_list
     * @return \Entity\Duty
     */
    public function setPaysList($pays_list)
    {
        $this->pays_list = $pays_list;

        return $this;
    }

    /**
     * Get the value of pays_list.
     *
     * @return string
     */
    public function getPaysList()
    {
        return $this->pays_list;
    }

    /**
     * Set the value of is_free.
     *
     * @param integer $is_free
     * @return \Entity\Duty
     */
    public function setIsFree($is_free)
    {
        $this->is_free = $is_free;

        return $this;
    }

    /**
     * Get the value of is_free.
     *
     * @return integer
     */
    public function getIsFree()
    {
        return $this->is_free;
    }

    /**
     * Set the value of prix_minimum.
     *
     * @param string $prix_minimum
     * @return \Entity\Duty
     */
    public function setPrixMinimum($prix_minimum)
    {
        $this->prix_minimum = $prix_minimum;

        return $this;
    }

    /**
     * Get the value of prix_minimum.
     *
     * @return string
     */
    public function getPrixMinimum()
    {
        return $this->prix_minimum;
    }

    /**
     * Set the value of prix_maximum.
     *
     * @param string $prix_maximum
     * @return \Entity\Duty
     */
    public function setPrixMaximum($prix_maximum)
    {
        $this->prix_maximum = $prix_maximum;

        return $this;
    }

    /**
     * Get the value of prix_maximum.
     *
     * @return string
     */
    public function getPrixMaximum()
    {
        return $this->prix_maximum;
    }

    /**
     * Set the value of ultimatum_date.
     *
     * @param string $ultimatum_date
     * @return \Entity\Duty
     */
    public function setUltimatumDate($ultimatum_date)
    {
        $this->ultimatum_date = $ultimatum_date;

        return $this;
    }

    /**
     * Get the value of ultimatum_date.
     *
     * @return string
     */
    public function getUltimatumDate()
    {
        return $this->ultimatum_date;
    }

    /**
     * Set the value of image.
     *
     * @param string $image
     * @return \Entity\Duty
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
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \Entity\Duty
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_id.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of objet_id.
     *
     * @param integer $objet_id
     * @return \Entity\Duty
     */
    public function setObjetId($objet_id)
    {
        $this->objet_id = $objet_id;

        return $this;
    }

    /**
     * Get the value of objet_id.
     *
     * @return integer
     */
    public function getObjetId()
    {
        return $this->objet_id;
    }

    /**
     * Set User entity (one to one).
     *
     * @param \Entity\User $user
     * @return \Entity\Duty
     */
    public function setUser(User $user = null)
    {
        $user->setDuty($this);
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (one to one).
     *
     * @return \Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set Objet entity (one to one).
     *
     * @param \Entity\Objet $objet
     * @return \Entity\Duty
     */
    public function setObjet(Objet $objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get Objet entity (one to one).
     *
     * @return \Entity\Objet
     */
    public function getObjet()
    {
        return $this->objet;
    }

    public function __sleep()
    {
        return array('id', 'contenu', 'pays_list', 'is_free', 'prix_minimum', 'prix_maximum', 'ultimatum_date', 'image', 'user_id', 'objet_id');
    }
}
<?php


use Doctrine\ORM\Mapping as ORM;

/**
 * Objects
 *
 * @ORM\Entity(repositoryClass="App\Repositories\Objects\EloquentObjectsRepository")
 * @ORM\Table(name="objects", indexes={@ORM\Index(name="objects_country_id_foreign", columns={"country_id"})})
 */
class Objects
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="string", length=255, nullable=false)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="local_prix", type="string", length=10, nullable=false)
     */
    private $localPrix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=65535, nullable=false)
     */
    private $image;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country;


    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return Object
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
     * Set the value of name.
     *
     * @param string $name
     * @return Object
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of desc.
     *
     * @param string $desc
     * @return Object
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
     * Set the value of country.
     *
     * @param integer $country
     * @return Object
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of country.
     *
     * @return integer
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of localPrix.
     *
     * @param string $localPrix
     * @return Object
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
     * @return Object
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

/*
    public function __sleep()
    {
        return array('id', 'name', 'desc', 'country', 'localPrix', 'image');
    }
*/
}


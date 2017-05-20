<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * Duties
 * @ORM\Table(name="duties", indexes={@ORM\Index(name="duties_objet_id_foreign", columns={"objet_id"}), @ORM\Index(name="duties_country_id_foreign", columns={"country_id"}), @ORM\Index(name="duties_user_id_foreign", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repositories\Duties\EloquentDutiesRepository")
 */
class Duties
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
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_free", type="boolean", nullable=false)
     */
    private $isFree;

    /**
     * @var string
     *
     * @ORM\Column(name="min_price", type="string", length=45, nullable=false)
     */
    private $minPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="max_price", type="string", length=45, nullable=false)
     */
    private $maxPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultimatum_date", type="date", nullable=false)
     */
    private $ultimatumDate;

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
     * @var \Objects
     *
     * @ORM\ManyToOne(targetEntity="Objects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="objet_id", referencedColumnName="id")
     * })
     */
    private $object;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->objects = new ArrayCollection();        
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
     * Set the value of title.
     *
     * @param string $title
     * @return \Entity\Duty
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of country.
     *
     * @param string $country
     * @return \Entity\Duty
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
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
     * Set the value of minPrice
     *
     * @param string $minPrice
     * @return \Entity\Duty
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    /**
     * Get the value of minPrice.
     *
     * @return string
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set the value of maxPrice.
     *
     * @param string $maxPrice
     * @return \Entity\Duty
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of maxPrice.
     *
     * @return string
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
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
     * Set the value of user.
     *
     * @param integer $user
     * @return \Entity\Duty
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of user.
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set Object entity (one to one).
     *
     * @param Objects $object
     * @return Duties
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get Object entity (one to one).
     *
     * @return Objects
     */
    public function getObject()
    {
        return $this->object;
    }

    public function __sleep()
    {
        return array('id', 'contenu', 'country', 'isFree', 'minPrice', 'maxPrice', 'ultimatumDate', 'image', 'user', 'object');
    }


}


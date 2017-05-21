<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Duties
 * @ORM\Entity(repositoryClass="App\Repositories\Duties\EloquentDutiesRepository")
 *
 * @ORM\Table(name="duties", indexes={@ORM\Index(name="duties_item_id_foreign", columns={"item_id"}), @ORM\Index(name="duties_country_id_foreign", columns={"country_id"}), @ORM\Index(name="duties_user_id_foreign", columns={"user_id"})})
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
     * @var \Items
     *
     * @ORM\ManyToOne(targetEntity="Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     * })
     */
    private $item;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


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
     * Set the value of item.
     *
     * @param integer $item
     * @return \Entity\Duty
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of item.
     *
     * @return integer
     */
    public function getItem()
    {
        return $this->item;
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

}


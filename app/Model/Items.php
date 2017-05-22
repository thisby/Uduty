<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items", indexes={@ORM\Index(name="items_country_id_foreign", columns={"country_id"})})
 * @ORM\Entity
 */
class Items
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
     * One item has Many duties.
     * @ORM\OneToMany(targetEntity="Duties", mappedBy="item")
     */
    protected $duties;
    

    public function __construct() {
        $this->duties = new ArrayCollection();
    }


    /**
     * Set the value of name.
     *
     * @param integer $name
     * @return \Entity\Duty
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of localPrix.
     *
     * @param integer $localPrix
     * @return \Entity\Duty
     */
    public function setLocalPrix($localPrix)
    {
        $this->localPrix = $localPrix;

        return $this;
    }

    /**
     * Get the value of localPrix.
     *
     * @return integer
     */
    public function getLocalPrix()
    {
        return $this->localPrix;
    }

}


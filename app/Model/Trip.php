<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\Trip
 *
 * @ORM\Entity(repositoryClass="App\Repositories\Trip\EloquentTripRepository")
 * @ORM\Table(name="trip", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_7656F53BAEBAE514", columns={"countries_id"})}, indexes={@ORM\Index(name="fk_trip_countries1_idx", columns={"countries_id"})})
 */
class Trip
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
     * @var integer
     *
     * @ORM\Column(name="transport_id", type="integer", nullable=true)
     */
    private $transportId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime", nullable=true)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $dateFin;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries",fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users",fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Set User entity (one to one).
     *
     * @param User $user
     * @return Trip
     */
    public function setUser(Users $user = null)
    {
        //$user->setDuty($this);
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (one to one).
     *
     * @return Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of country.
     *
     * @param string $country
     * @return Trip
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

}


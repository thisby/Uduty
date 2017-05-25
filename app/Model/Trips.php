<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Trips
 *
 * @ORM\Entity(repositoryClass="App\Repositories\Trip\EloquentTripRepository")
 * @ORM\Table(name="trips", indexes={@ORM\Index(name="trips_country_id_foreign", columns={"country_id"}), @ORM\Index(name="trips_user_id_foreign", columns={"user_id"})})
 */
class Trips
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
     * @ORM\Column(name="transport_id", type="integer", nullable=false)
     */
    private $transportId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_date", type="date", nullable=false)
     */
    private $departureDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=false)
     */
    private $endDate;

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
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Set User entity (one to one).
     *
     * @param Users $user
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
     * @param Countries $country
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
     * @return Countries
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of departureDate.
     *
     * @param Date $departureDate
     * @return Trip
     */
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get the value of departureDate.
     *
     * @return Trip
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set the value of endDate.
     *
     * @param Date $endDate
     * @return Trip
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of endDate.
     *
     * @return Trip
     */
    public function getEndDate()
    {
        return $this->endDate;
    }    
}


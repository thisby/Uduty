<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Trips
 *
 * @ORM\Table(name="trips", indexes={@ORM\Index(name="trips_country_id_foreign", columns={"country_id"}), @ORM\Index(name="trips_user_id_foreign", columns={"user_id"})})
 * @ORM\Entity
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
     * @ORM\ManyToOne(targetEntity="Countries")
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


}


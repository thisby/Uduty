<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\Trip
 *
 * @ORM\Table(name="trip", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_7656F53BAEBAE514", columns={"countries_id"})}, indexes={@ORM\Index(name="fk_trip_countries1_idx", columns={"countries_id"})})
 * @ORM\Entity
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
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countries_id", referencedColumnName="country_id")
     * })
     */
    private $countries;


}


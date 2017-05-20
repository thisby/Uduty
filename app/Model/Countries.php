<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="countries", uniqueConstraints={@ORM\UniqueConstraint(name="idx_code", columns={"code"})}, indexes={@ORM\Index(name="idx_continent_code", columns={"continent_code"})})
 * @ORM\Entity
 */
class Countries
{
    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=128, nullable=false)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=false)
     */
    private $iso3;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="smallint", nullable=false)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="display_order", type="integer", nullable=false)
     */
    private $displayOrder = '900';

    /**
     * @var \Continents
     *
     * @ORM\ManyToOne(targetEntity="Continents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="continent_code", referencedColumnName="code")
     * })
     */
    private $continentCode;


}


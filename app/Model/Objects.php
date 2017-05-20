<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Objects
 *
 * @ORM\Table(name="objects", indexes={@ORM\Index(name="objects_country_id_foreign", columns={"country_id"})})
 * @ORM\Entity
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


}


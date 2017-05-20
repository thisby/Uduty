<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Duties
 *
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
    private $objet;

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


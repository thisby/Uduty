<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Duty
 *
 * @ORM\Table(name="duty", indexes={@ORM\Index(name="fk_duty_objet1_idx", columns={"objet_id"}), @ORM\Index(name="fk_duty_1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Duty
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=true)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="countries_list", type="text", nullable=true)
     */
    private $countriesList;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_free", type="smallint", nullable=true)
     */
    private $isFree;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_minimum", type="string", length=45, nullable=true)
     */
    private $prixMinimum;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_maximum", type="string", length=45, nullable=true)
     */
    private $prixMaximum;

    /**
     * @var string
     *
     * @ORM\Column(name="ultimatum_date", type="string", length=45, nullable=true)
     */
    private $ultimatumDate;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var \Objet
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Objet")
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


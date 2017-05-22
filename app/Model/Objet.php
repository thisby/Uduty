<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Objet
 *
 * @ORM\Table(name="objet")
 * @ORM\Entity
 */
class Objet
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
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="string", length=255, nullable=true)
     */
    private $desc;

    /**
     * @var integer
     *
     * @ORM\Column(name="countries_id", type="integer", nullable=true)
     */
    private $countriesId;

    /**
     * @var string
     *
     * @ORM\Column(name="local_prix", type="string", length=10, nullable=true)
     */
    private $localPrix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;


}


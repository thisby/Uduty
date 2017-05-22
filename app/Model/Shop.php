<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop", indexes={@ORM\Index(name="shop_dutyid_foreign", columns={"dutyId"}), @ORM\Index(name="shop_userid_foreign", columns={"userId"})})
 * @ORM\Entity
 */
class Shop
{
    /**
     * @var integer
     *
     * @ORM\Column(name="shopId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $shopid;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty", type="integer", nullable=false)
     */
    private $qty;

    /**
     * @var \Duty
     *
     * @ORM\ManyToOne(targetEntity="Duties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dutyId", referencedColumnName="id")
     * })
     */
    private $dutyid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;


}


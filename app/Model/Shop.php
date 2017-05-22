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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty", type="integer", nullable=false)
     */
    private $qty;

    /**
     * @var \Duties
     *
     * @ORM\ManyToOne(targetEntity="Duties",fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="duty_id", referencedColumnName="id")
     * })
     */
    private $duty;

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
     * Set the value of duty.
     *
     * @param integer $duty
     * @return Shop
     */
        public function setDuty($duty)
        {
            $this->duty = $duty;

            return $this;
        }

    /**
     * Get the value of duty.
     *
     * @return integer
     */
    public function getDuty()
    {
        return $this->qty;
    }


    /**
     * Set the value of user.
     *
     * @param integer $user
     * @return Shop
     */
        public function setUser($user)
        {
            $this->user = $user;

            return $this;
        }

    /**
     * Get the value of user.
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set the value of qty.
     *
     * @param integer $qty
     * @return Shop
     */
        public function setQty($qty)
        {
            $this->qty = $qty;

            return $this;
        }

    /**
     * Get the value of qty.
     *
     * @return integer
     */
    public function getQty()
    {
        return $this->qty;
    }



}


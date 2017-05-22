<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Continents
 *
 * @ORM\Table(name="continents")
 * @ORM\Entity
 */
class Continents
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * Set the value of name.
     *
     * @param integer $name
     * @return \Entity\Duty
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }    

    /**
     * Set the value of code.
     *
     * @param integer $code
     * @return \Entity\Continents
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }
}


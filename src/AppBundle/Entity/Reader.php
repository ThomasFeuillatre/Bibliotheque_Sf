<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reader
 *
 * @ORM\Table(name="reader")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReaderRepository")
 */
class Reader
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\ManyToOne(targetEntity="Borrow", inversedBy="reader")
     * @ORM\JoinColumn(name="borrow_id", referencedColumnName="id")
     */
    private $borrow;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Reader
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Reader
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set borrow
     *
     * @param \AppBundle\Entity\Borrow $borrow
     *
     * @return Reader
     */
    public function setBorrow(\AppBundle\Entity\Borrow $borrow = null)
    {
        $this->borrow = $borrow;

        return $this;
    }

    /**
     * Get borrow
     *
     * @return \AppBundle\Entity\Borrow
     */
    public function getBorrow()
    {
        return $this->borrow;
    }
}

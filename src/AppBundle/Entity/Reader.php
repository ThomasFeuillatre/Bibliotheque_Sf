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
     * @var \DateTime
     *
     * @ORM\Column(name="dateAbonnement", type="date", nullable=true)
     */
    private $dateAbonnement;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\OneToMany(targetEntity="Borrow", mappedBy="reader")
     */
    private $borrows;
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
     * Get borrow
     *
     * @return \AppBundle\Entity\Borrow
     */
    public function getBorrows()
    {
        return $this->borrows;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->borrows = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add borrow
     *
     * @param \AppBundle\Entity\Borrow $borrow
     *
     * @return Reader
     */
    public function addBorrow(\AppBundle\Entity\Borrow $borrow)
    {
        $this->borrows[] = $borrow;

        return $this;
    }

    /**
     * Remove borrow
     *
     * @param \AppBundle\Entity\Borrow $borrow
     */
    public function removeBorrow(\AppBundle\Entity\Borrow $borrow)
    {
        $this->borrows->removeElement($borrow);
    }

    /**
     * Set dateAbonnement
     *
     * @param \DateTime $dateAbonnement
     *
     * @return Reader
     */
    public function setDateAbonnement($dateAbonnement)
    {
        $this->dateAbonnement = $dateAbonnement;

        return $this;
    }

    /**
     * Get dateAbonnement
     *
     * @return \DateTime
     */
    public function getDateAbonnement()
    {
        return $this->dateAbonnement;
    }
}

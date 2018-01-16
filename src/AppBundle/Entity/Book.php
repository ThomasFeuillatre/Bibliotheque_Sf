<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 */
class Book
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
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Summary", type="string", length=255)
     */
    private $summary;

    /**
     * @ORM\OneToMany(targetEntity="Borrow", mappedBy="book")
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
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Book
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
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
     * @return Book
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
}

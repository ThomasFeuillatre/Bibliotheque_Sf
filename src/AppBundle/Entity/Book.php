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
     * @ORM\ManyToOne(targetEntity="Borrow", inversedBy="book")
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
     * Set borrow
     *
     * @param \AppBundle\Entity\Borrow $borrow
     *
     * @return Book
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

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Borrow
 *
 * @ORM\Table(name="borrow")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BorrowRepository")
 */
class Borrow
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
     * @var \DateTime
     *
     * @ORM\Column(name="DateBorrow", type="date")
     */
    private $dateBorrow;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Deadline", type="date")
     */
    private $deadline;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="borrow")
     */
    private $book;

    /**
     * @ORM\OneToMany(targetEntity="Reader", mappedBy="borrow")
     */
    private $reader;


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
     * Set dateBorrow
     *
     * @param \DateTime $dateBorrow
     *
     * @return Borrow
     */
    public function setDateBorrow($dateBorrow)
    {
        $this->dateBorrow = $dateBorrow;

        return $this;
    }

    /**
     * Get dateBorrow
     *
     * @return \DateTime
     */
    public function getDateBorrow()
    {
        return $this->dateBorrow;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Borrow
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->book = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reader = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Borrow
     */
    public function addBook(\AppBundle\Entity\Book $book)
    {
        $this->book[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \AppBundle\Entity\Book $book
     */
    public function removeBook(\AppBundle\Entity\Book $book)
    {
        $this->book->removeElement($book);
    }

    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Add reader
     *
     * @param \AppBundle\Entity\Reader $reader
     *
     * @return Borrow
     */
    public function addReader(\AppBundle\Entity\Reader $reader)
    {
        $this->reader[] = $reader;

        return $this;
    }

    /**
     * Remove reader
     *
     * @param \AppBundle\Entity\Reader $reader
     */
    public function removeReader(\AppBundle\Entity\Reader $reader)
    {
        $this->reader->removeElement($reader);
    }

    /**
     * Get reader
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReader()
    {
        return $this->reader;
    }
}

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
     * @var
     *int
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
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="borrows")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reader", inversedBy="borrows")
     * @ORM\JoinColumn(name="reader_id", referencedColumnName="id")
     */
    private $reader;

    /**
     * @var \Integer
     *
     * @ORM\Column(name="statut", type="integer")
     */
    private $statut = 0;

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

    /**
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Borrow
     */
    public function setBook(\AppBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Set reader
     *
     * @param \AppBundle\Entity\Reader $reader
     *
     * @return Borrow
     */
    public function setReader(\AppBundle\Entity\Reader $reader = null)
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Borrow
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: AIES
 * Date: 15/01/2018
 * Time: 12:27
 */

namespace AppBundle\Fixture;


use AppBundle\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $book = new Book();
        $book->setSummary("Fitz, l'assassin royal, est appelé à reprendre du service pour retrouver ceux qui ont enlevé sa fille, Abeille, et son amie Evite.");
        $book->setTitle("Le fou et l'assassin - Tome 4 : Le retour de l'assassin");
        $manager->persist($book);

        $this->addReference("livre1",$book);

        $manager->flush();
    }
}
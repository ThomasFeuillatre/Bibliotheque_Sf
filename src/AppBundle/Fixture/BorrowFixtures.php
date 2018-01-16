<?php
/**
 * Created by PhpStorm.
 * User: AIES
 * Date: 15/01/2018
 * Time: 13:47
 */

namespace AppBundle\Fixture;


use AppBundle\Entity\Borrow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BorrowFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $borrow1 = new Borrow();
        $borrow1->setBook($this->getReference('livre1'));
        $borrow1->setReader($this->getReference('reader1'));
        $borrow1->setDateBorrow(new \DateTime("2018-01-15"));
        $borrow1->setDeadline(new \DateTime("2018-02-15"));
        $manager->persist($borrow1);

        $borrow2 = new Borrow();
        $borrow2->setBook($this->getReference('livre1'));
        $borrow2->setReader($this->getReference('reader2'));
        $borrow2->setDateBorrow(new \DateTime("2018-02-16"));
        $borrow2->setDeadline(new \DateTime("2018-03-16"));
        $manager->persist($borrow2);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies()
    {
        return array(
            ReaderFixtures::class,
            BookFixtures::class
        );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: AIES
 * Date: 15/01/2018
 * Time: 12:27
 */

namespace AppBundle\Fixture;


use AppBundle\Entity\Reader;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\BadMethodCallException;
use Doctrine\Common\Persistence\ObjectManager;

class ReaderFixtures extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     * @throws BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $reader1 = new Reader();
        $reader1->setFirstName("Thomas");
        $reader1->setName("Feuillatre");
        $manager->persist($reader1);

        $reader2 = new Reader();
        $reader2->setFirstName("Jean");
        $reader2->setName("Dupont");
        $reader2->setDateAbonnement(new \DateTime("2018-04-15"));
        $manager->persist($reader2);

        $this->addReference('reader2',$reader2);
        $this->addReference('reader1', $reader1);

        $manager->flush();
    }
}
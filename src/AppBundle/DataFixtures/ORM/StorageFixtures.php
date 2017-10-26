<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Storage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StorageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $name = ['Chambre', 'Garage', 'Abris de jardin', 'Container', 'Petit Entrepot', 'Moyen Entrepot', 'Grand Entrepot', 'Hangar'];
        $length = [5, 10 , 20 , 30, 50, 75 , 150 , 250];
        $price = [0, 500, 2500, 5000, 25000, 100000, 500000, 1000000];

        for ($i = 0; $i < count($name); $i++){
            $storage = new Storage();
            $storage->setName($name[$i])
                ->setLength($length[$i])
                ->setPrice($price[$i]);
                $manager->persist($storage);
        }



        $manager->flush();
    }
}

<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $name = ['Eau', 'Pierre', 'Gaz', 'Petrole', 'Aluminium', 'Or', 'Cuivre', 'Fer', 'Sable', 'Charbon', 'Bois'];
        for ($i = 0; $i < count($name); $i++) {
            $product = new Product();
            $product->setName($name[$i]);
            $product->setQuantity(mt_rand(1000,15000));
            $product->setMidPrice(mt_rand(1, 500));
            $product->setPrice(mt_rand(10, 500));
            $product->setTier(1);
            $manager->persist($product);
        }

        $manager->flush();
    }
}

<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $name = ['Eau', 'Pierre', 'Gaz', 'Petrole', 'Aluminium', 'Or', 'Cuivre', 'Fer', 'Sable', 'Charbon', 'Bois'];
        $temp = 0;
        $final = [];

        for ($i = 0; $i < count($name); $i++) {
            $quantity = mt_rand(1000,15000);
            $temp += $quantity;
            array_push($final, [
                'name' => $name[$i],
                'quantity' => $quantity,
                'variation' => rand(-50 , 50)
            ]);
        }

        foreach ($final as $datas) {
            $price = $temp / $datas['quantity'] * 25;
            $product = new Product();
            $product->setName($datas['name'])
                ->setQuantity($datas['quantity'])
                ->setMidPrice($price)
                ->setPrice($price)
                ->setTier(1)
                ->setVariation($datas['variation']);
            $manager->persist($product);
        }

        $manager->flush();
    }
}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Product;

class MarketController extends Controller
{
    /**
     * @Route("/market/tier/one")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        return $this->render('market/tier_one.html.twig', [
            'products' => $products
        ]);
    }
}

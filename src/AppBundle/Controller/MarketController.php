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
        $repository = $this->getDoctrine()->getRepository("AppBundle:Product");
        $products = $repository->findAll();

        return $this->render('AppBundle:Market:tier_one.html.twig', [
            'products' => $products
        ]);
    }
}

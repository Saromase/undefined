<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Storage;

/**
 * Controller de la page Storage
 * @return array
 */
class StorageController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * @Route("/storage")
     * @return Factory|View
     */
    public function displayStorages()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Storage");
        $storage = $repository->findAll();

        return $this->render('AppBundle:Storage:storage.html.twig', [
            'storage' => $storage
        ]);
    }
}

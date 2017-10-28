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
       * @Route('/storage', name='storage')
       * @return Factory|View
       */
      public function displayStorages()
      {
          $playerStorage = $this->getUser()->getStorage();
          $inventory = $this->getUser()->getInventory();
          $playerMoney = $this->getUser()->getMoney();
          $playerStorageId = $playerStorage->getId();

          // On récupére le dernier storage
          $lastStorage = Storage::get()->last();

          if ($lastStorage === $this->getUser()->getStorage()) {
              return $this->render('storage.html.twig', [
                  'storage' => $playerStorage,
                  'inventory' => $inventory
              ]);
          } else {
              // id du futur storage
              $futureStorageId = $playerStorageId + 1;

              // On récupère la valeur de l'amélioration du storage
              $upgradePrice = Storage::findOneById($futureStorageId)->getPrice();
              // On verifie si il possede un inventaire si il est vide on lui met un message
              if ($inventory->isEmpty()) {
                  session()->flash('warning', 'Vous n\'avez aucun produit !');
                  return $this->render('storage.html.twig', [
                      'storage' => $playerStorage,
                      'inventory' => $inventory,
                      'playerMoney' => $playerMoney,
                      'upgradePrice' => $upgradePrice
                  ]);
              } else {
                  return $this->render('storage.html.twig', [
                      'storage' => $playerStorage,
                      'inventory' => $inventory,
                      'playerMoney' => $playerMoney,
                      'upgradePrice' => $upgradePrice
                  ]);
              }
          }
      }}

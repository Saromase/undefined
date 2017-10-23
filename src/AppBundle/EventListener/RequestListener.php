<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 27/06/2016
 * Time: 16:32
 */

namespace AppBundle\EventListener;

use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Class RequestListener
 * @package TicketBundle\EventListener
 */
class RequestListener
{
    /** @var ContainerInterface $container */
    private $container;

    /**
     * RequestListener constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param GetResponseEvent $event
     * @return void
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            // don't do anything if it's not the master request
            return;
        }

        if (!is_object($user = $this->getUser())) {
            return;
        }

        //Add content here
    }


    /**
     * @return User|void
     */
    public function getUser()
    {
        /** @var TokenInterface $token */
        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            return;
        }

        return $user;
    }
}
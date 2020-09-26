<?php


namespace App\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class MyCustomLogoutListener
{
    /**
     * @param LogoutEvent $logoutEvent
     */
    public function __invoke(LogoutEvent $logoutEvent)
    {
        $response = new Response("Successfully logged out");
        $logoutEvent->setResponse($response);
    }
}

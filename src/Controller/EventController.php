<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Eventcontroller.
 * @Route("/",name="apiEvent")
 */
class EventController extends FOSRestController
{
    /**
     * Create an event
     * @Rest\Post("/create")
     * 
     * @return Response
     */
    public function createEvent(Request $request)
    {
        $view = $this->view("Hello world", 200);
        return $this->handleView($view);
    }
}
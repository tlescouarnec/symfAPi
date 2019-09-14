<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

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

    /**
     * Create an event
     * @Rest\Put("/edit/{eventId}")
     * 
     * @return Response
     */
    public function editEvent(int $eventId, Request $request)
    {
        $view = $this->view("edit", 200);
        return $this->handleView($view);
    }

        /**
     * Create an event
     * @Rest\Delete("/delete/{eventId}")
     * 
     * @return Response
     */
    public function deleteEvent(int $eventId, Request $request)
    {
        $view = $this->view("delete", 200);
        return $this->handleView($view);
    }
}
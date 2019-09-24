<?php

namespace App\Controller;

use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * CreateEventcontroller.
 * @Route("/create",name="create_event")
 */
class CreateEventController extends FOSRestController
{
    /**
     * Create an event
     * @Rest\Post("/")
     * 
     * @return Response
     */
    public function createEvent(Request $request)
    {
        $view = $this->view('CREATE controller', 200);
        return $this->handleView($view);
    }
}
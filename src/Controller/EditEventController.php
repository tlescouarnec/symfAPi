<?php

namespace App\Controller;

use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * EditEventcontroller.
 * @Route("/edit",name="edit_event")
 */
class EditEventController extends FOSRestController
{

    /**
     * edit an events
     * @Rest\Put("/{eventId}")
     * 
     * @return Response
     */
    public function editEvents(Request $request)
    {
        $view = $this->view('EDIT controller', 200);
        return $this->handleView($view);
    }
}
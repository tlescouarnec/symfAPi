<?php

namespace App\Controller;

use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * DeleteEventcontroller.
 * @Route("/delete",name="Delete_event")
 */
class DeleteEventController extends FOSRestController
{

    /**
     * Delete an events
     * @Rest\Delete("/{eventId}")
     * 
     * @return Response
     */
    public function deleteEvents(int $eventId, Request $request)
    {
        $event = $this->get('pomm')
        ->getDefaultSession()
        ->getModel(EventModel::class)
        ->deleteByPk(['event_id' => $eventId]);

        $view = $this->view($event, 200);
        return $this->handleView($view);
    }
}
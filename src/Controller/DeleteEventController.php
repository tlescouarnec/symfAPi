<?php

namespace App\Controller;

use App\Db\ApplicationSchema\RegisterModel;
use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * DeleteEventcontroller.
 * @Route("/event",name="delete_event")
 */
class DeleteEventController extends FOSRestController
{

    /**
     * Delete an events
     * @Rest\Delete("/delete/{eventId}")
     * 
     * @return Response
     */
    public function deleteEvents(int $eventId, Request $request)
    {
        $event_model = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class);

        $event = $event_model->findByPk(['event_id' => $eventId]);

        if ($event)
        {   
            //Need to delete registrations first otherwise it violates the foreign key rules
            $this->get('pomm')
            ->getDefaultSession()
            ->getModel(RegisterModel::class)
            ->deleteWhere('event_id = $*', [$eventId]);

            //Delete the event itself
            $event_model->deleteWhere('event_id = $*', [$eventId]);
                
            $view = $this->view('Event and registrations deleted', 200);
        } else {
            $view = $this->view("No event with this id", 404);
        }
        return $this->handleView($view);
    }
}
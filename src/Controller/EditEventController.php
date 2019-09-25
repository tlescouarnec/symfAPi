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
 * @Route("/event",name="edit_event")
 */
class EditEventController extends FOSRestController
{

    /**
     * Edit an events
     * @Rest\Put("/edit/{eventId}")
     * 
     * @return Response
     */
    public function editEvents(int $eventId, Request $request)
    {
        //Basic verifications, i might put this in a service if i don't make Symfony constraints work with pomm
        if (!strtotime($request->get('start_date')) || !strtotime($request->get('end_date'))) {
            $view = $this->view('Dates not valid', 403);
            return $this->handleView($view);
        } elseif (empty($request->get('name'))) {
            $view = $this->view('A name must be set', 403);
            return $this->handleView($view);
        }

        $event_model = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class);
        $event = $event_model->findByPk(['event_id' => $eventId]);

        if ($event) {
            //Change the EventModel values and update it
            $event 
                ->setName($request->get('name'))
                ->setTimespan('[' . $request->get('start_date') . ',' . $request->get('end_date') . ']')
                ->setUpdated_at(date("Y-m-d H:i:s"));

                $event_model->updateOne(
                    $event,
                    ['name', 'timespan', 'updated_at']
                );

            $view = $this->view("Edition confirmed", 200);
        } else {
            $view = $this->view("No event with this id", 404);
        }

        return $this->handleView($view);
    }
}
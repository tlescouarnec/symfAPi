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
        $event_model = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class);

        $event = $event_model->findByPk(['event_id' => $eventId]);

        if ($event) {
            //Change the EventModel values and update it
            $event 
                ->setName($request->get('name'))
                ->setTimespan('[' . $request->get('beginDate') . ',' . $request->get('endDate') . ']')
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
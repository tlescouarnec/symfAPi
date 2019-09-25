<?php

namespace App\Controller;

use App\Db\ApplicationSchema\Event;
use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * CreateEventcontroller.
 * @Route("/event",name="create_event")
 */
class CreateEventController extends FOSRestController
{
    /**
     * Create an event
     * @Rest\Post("/create")
     * 
     * @return Response
     */
    public function createEvent(Request $request)
    {
        //Basic verifications, i might put this in a service if i don't make Symfony constraints work with pomm
        if (!strtotime($request->get('start_date')) || !strtotime($request->get('end_date'))) {
            $view = $this->view('Dates not valid', 403);
            return $this->handleView($view);
        } elseif (empty($request->get('name'))) {
            $view = $this->view('A name must be set', 403);
            return $this->handleView($view);
        }

        //Use the flexible entity Event to set properties
        $event = new Event([
            'name'     => $request->get('name'),
            'timespan' => '[' . $request->get('start_date') . ',' . $request->get('end_date') . ']',
            'max_register'  => $request->get('max_register')
        ]);

        $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class)
            ->insertOne($event);

        return $this->handleView($this->view('Event created', 200));
    }
}
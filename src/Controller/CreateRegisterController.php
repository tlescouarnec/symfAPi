<?php

namespace App\Controller;

use App\Db\ApplicationSchema\Register;
use App\Db\ApplicationSchema\RegisterModel;
use App\Db\ApplicationSchema\EventModel;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
Use Symfony\Component\Routing\Annotation\Route;

/**
 * CreateRegistercontroller.
 * @Route("/register",name="create_register")
 */
class CreateRegisterController extends FOSRestController
{
    /**
     * Create a register entry
     * @Rest\Post("/create")
     * 
     * @return Response
     */
    public function createRegister(Request $request)
    {
        $register_model = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(RegisterModel::class);

        $event = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class)
            ->findByPk(['event_id' => $request->get('event_id')]);

        if ($event) {
            //Check if the event is at max register limit
            $count = $register_model->countWhere("event_id = $*" , [$request->get('event_id')]);

            $event = $this->get('pomm')
            ->getDefaultSession()
            ->getModel(EventModel::class)
            ->findByPk(['event_id' => $request->get('event_id')]);

            if ($count >= $event->get('max_register')) {
                $view = $this->view('There are too many registrations on this event', 500);
            } else {
                //Use the flexible entity Register to set properties
                $register = new Register([
                    'firstname'     => $request->get('firstname'),
                    'lastname'     => $request->get('lastname'),
                    'email'     => $request->get('email'),
                    'phone'     => $request->get('phone'),
                    'event_id'     => $request->get('event_id'),
                ]);
                $register_model->insertOne($register);
                $view = $this->view("Registration confirmed", 200);
            }
        } else {
            $view = $this->view("No event with this id", 404);
        }

        return $this->handleView($view);
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/pizza", name="pizza")
     */
    public function index()
    {

        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create()
    {

        return $this->render('pizza/create.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }
}

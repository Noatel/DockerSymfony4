<?php

namespace App\Controller;

use App\Entity\Ingredients;
use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/pizza", name="pizza")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Pizza::class);
        $pizzas = $repository->findAll();

        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'pizzas' => $pizzas
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create()
    {
        $repository = $this->getDoctrine()->getRepository(Ingredients::class);

        $sauces = $repository->findBy(
            ['type' => 0]
        );
        $toppings = $repository->findBy(
            ['type' => 1]
        );

        return $this->render('pizza/create.html.twig', [
            'controller_name' => 'PizzaController',
            'sauces' => $sauces,
            'toppings' => $toppings
        ]);
    }

    /**
     * @Route("/createPizza", name="createPizza")
     */
    public function createPizza(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Ingredients::class);

        $em = $this->getDoctrine()->getManager();
        $sauce = $repository->find($request->request->get('sauce'));
        $topping1 = $repository->find($request->request->get('topping1'));
        $topping2 = $repository->find($request->request->get('topping2'));
        $topping3 = $repository->find($request->request->get('topping3'));

        $pizza = new Pizza();
        $pizza->setName($request->request->get('name'));
        $pizza->addPizza($sauce);
        $pizza->addPizza($topping1);
        $pizza->addPizza($topping2);
        $pizza->addPizza($topping3);



        $em->persist($pizza);
        $em->flush();

        return $this->redirect('/pizza');
    }
}

<?php

namespace App\Controller;

use App\Entity\Ingredients;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IngredientsController extends AbstractController
{
    /**
     * @Route("ingredients", name="ingredients")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Ingredients::class);

        $sauces = $repository->findBy(
            ['type' => 0]
        );
        $toppings = $repository->findBy(
            ['type' => 1]
        );

        return $this->render('ingredients/create.html.twig', [
            'controller_name' => 'IngredientsController',
            'sauces' => $sauces,
            'toppings' => $toppings
        ]);
    }

    /**
     * @Route("ingredients/sauce")
     */
    public function createSauce(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $ingredient = new Ingredients();
        $ingredient->setName($request->request->get('sauce'));
        $ingredient->setType(0);

        $em->persist($ingredient);
        $em->flush();

        return $this->redirect('/ingredients');


    }

    /**
     * @Route("ingredients/topping",  name="create topping", methods={"POST"})
     */
    public function createTopping(Request $request)
    {
        $toppings = $request->request->get('topping');
        $em = $this->getDoctrine()->getManager();


        $ingredient = new Ingredients();
        $ingredient->setName($toppings);
        $ingredient->setType(1);

        $em->persist($ingredient);
        $em->flush();


        return $this->redirect('/ingredients');

    }
}

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
        return $this->render('ingredients/create.html.twig', [
            'controller_name' => 'IngredientsController',
        ]);
    }

    /**
     * @Route("ingredients/sauce")
     */
    public function createSauce(Request $request){

        $em = $this->getDoctrine()->getManager();

        $ingredient = new Ingredients();
        $ingredient->setName($request->request->get('sauce'));
        $ingredient->setType(0);

        $em->persist($ingredient);
        $em->flush();

        return $this->render('ingredients/create.html.twig', [
            'controller_name' => 'IngredientsController',
        ]);
    }

    /**
     *  @Route("ingredients/topping",  name="create topping", methods={"POST"})
     */
    public function createTopping(Request $request)
    {
        $toppings = $request->request->get('topping');

        $ingredients = new Ingredients();
        $ingredients->setName($toppings);
        $ingredients->setType(0);

        return $this->render('ingredients/create.html.twig', [
            'controller_name' => 'IngredientsController',
        ]);
    }
}

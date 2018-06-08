<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bidding;
use AppBundle\Entity\TipsRevenue;
use AppBundle\Entity\Dish;
use AppBundle\Entity\Recipe;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
 * Dish controller.
 *
 * @Route("dish")
 */
class DishController extends Controller
{
    /**
     * Lists all dish entities.
     *
     * @Route("/", name="dish_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dishes = $em->getRepository('AppBundle:Dish')->findAll();
        //$ingredient = $em->getRepository('AppBundle:Recipe')->findAll();


        $form = $this->createFormBuilder();
//        foreach ($ingredient as $ing) {
//            $form->add($ing->getId(), NumberType::class);
//        }

        return $this->render('dish/index.html.twig', array(
            'dishes' => $dishes,
//            'ingredient' => $ingredient,
            'form' => $form->getForm()->createView()
        ));
    }

    /**
     * Creates a new dish entity.
     *
     * @Route("/new", name="dish_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dish = new Dish();
        $recipe1 = new Recipe();
        $recipe1->setDish($dish);
        $form = $this->createForm('AppBundle\Form\DishType', $dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dish);
            $em->flush();

            return $this->redirectToRoute('dish_show', array('id' => $dish->getId()));
        }

        $em = $this->getDoctrine()->getManager();

        $ingredients = $em->getRepository('AppBundle:Ingredient')->findAll();
        return $this->render('dish/new.html.twig', array(
            'dish' => $dish,
            'ingredients' => $ingredients,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dish entity.
     *
     * @Route("/{id}", name="dish_show")
     * @Method("GET")
     */
    public function showAction(Request $request, Dish $dish)
    {
        $deleteForm = $this->createDeleteForm($dish);

        $tipsRevenue = new TipsRevenue();
        //$dailyRevenue->setInputRevenue($input_revenue);
        $tipsRevenue_form = $this->createForm('AppBundle\Form\TipsRevenueType', $tipsRevenue);
        $tipsRevenue_form->handleRequest($request);

        if ($tipsRevenue_form->isSubmitted() && $tipsRevenue_form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipsRevenue);
            $em->flush();
        }

        return $this->render('dish/show.html.twig', array(
            'dish' => $dish,
            'delete_form' => $deleteForm->createView(),
            //'input_revenue' => $input_revenue->createView(),
            'tipsRevenue_form' => $tipsRevenue_form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing dish entity.
     *
     * @Route("/{id}/edit", name="dish_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dish $dish)
    {
        $deleteForm = $this->createDeleteForm($dish);
        $editForm = $this->createForm('AppBundle\Form\DishType', $dish);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dish_edit', array('id' => $dish->getId()));
        }

        return $this->render('dish/edit.html.twig', array(
            'dish' => $dish,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dish entity.
     *
     * @Route("/{id}", name="dish_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dish $dish)
    {
        $form = $this->createDeleteForm($dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dish);
            $em->flush();
        }

        return $this->redirectToRoute('dish_index');
    }

    /**
     * Creates a form to delete a dish entity.
     *
     * @param Dish $dish The dish entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dish $dish)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dish_delete', array('id' => $dish->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

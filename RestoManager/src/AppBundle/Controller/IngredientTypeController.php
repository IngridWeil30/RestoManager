<?php

namespace AppBundle\Controller;

use AppBundle\Entity\IngredientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ingredienttype controller.
 *
 * @Route("ingredienttype")
 */
class IngredientTypeController extends Controller
{
    /**
     * Lists all ingredientType entities.
     *
     * @Route("/", name="ingredienttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ingredientTypes = $em->getRepository('AppBundle:IngredientType')->findAll();

        return $this->render('ingredienttype/index.html.twig', array(
            'ingredientTypes' => $ingredientTypes,
        ));
    }

    /**
     * Creates a new ingredientType entity.
     *
     * @Route("/new", name="ingredienttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ingredientType = new Ingredienttype();
        $form = $this->createForm('AppBundle\Form\IngredientTypeType', $ingredientType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredientType);
            $em->flush();

            return $this->redirectToRoute('ingredienttype_show', array('id' => $ingredientType->getId()));
        }

        return $this->render('ingredienttype/new.html.twig', array(
            'ingredientType' => $ingredientType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ingredientType entity.
     *
     * @Route("/{id}", name="ingredienttype_show")
     * @Method("GET")
     */
    public function showAction(IngredientType $ingredientType)
    {
        $deleteForm = $this->createDeleteForm($ingredientType);

        return $this->render('ingredienttype/show.html.twig', array(
            'ingredientType' => $ingredientType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ingredientType entity.
     *
     * @Route("/{id}/edit", name="ingredienttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, IngredientType $ingredientType)
    {
        $deleteForm = $this->createDeleteForm($ingredientType);
        $editForm = $this->createForm('AppBundle\Form\IngredientTypeType', $ingredientType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ingredienttype_edit', array('id' => $ingredientType->getId()));
        }

        return $this->render('ingredienttype/edit.html.twig', array(
            'ingredientType' => $ingredientType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ingredientType entity.
     *
     * @Route("/{id}", name="ingredienttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, IngredientType $ingredientType)
    {
        $form = $this->createDeleteForm($ingredientType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ingredientType);
            $em->flush();
        }

        return $this->redirectToRoute('ingredienttype_index');
    }

    /**
     * Creates a form to delete a ingredientType entity.
     *
     * @param IngredientType $ingredientType The ingredientType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IngredientType $ingredientType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ingredienttype_delete', array('id' => $ingredientType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

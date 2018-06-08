<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/6/18
 * Time: 2:10 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\DailyRevenue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * DailyRevenue controller.
 *
 * @Route("waiter/dailyrevenue")
 */

class DailyRevenueController extends Controller
{
    /**
     * Lists all dailyRevenue entities.
     *
     * @Route("/", name="dailyrevenue_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dishes = $em->getRepository('AppBundle:Dish')->findAll();
        $dailyRevenues = $em->getRepository('AppBundle:DailyRevenue')->findAll();
        $inputRevenue = 0;
        $dailyRevenue = new DailyRevenue();
        $dailyRevenue_form = $this->createForm('AppBundle\Form\DailyRevenueType', $dailyRevenue);
        $dailyRevenue_form->handleRequest($request);

        if ($dailyRevenue_form->isSubmitted() && $dailyRevenue_form->isValid()) {
            $inputRevenue = $dailyRevenue->getInputRevenue();
            //var_dump($inputRevenue);
            $em = $this->getDoctrine()->getManager();
            $em->persist($dailyRevenue);
            $em->flush();
        }


        return $this->render('waiter/dailyrevenue/index.html.twig', array(
            'dailyRevenues' => $dailyRevenues,
            'dishes' => $dishes,
            'inputRevenue' => $inputRevenue,
            'dailyRevenue_form' => $dailyRevenue_form->createView(),
        ));
    }

    /**
     * Creates a new dailyRevenue entity.
     *
     * @Route("/new", name="dailyrevenue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dailyRevenue = new DailyRevenue();
        $form = $this->createForm('AppBundle\Form\DailyRevenueType', $dailyRevenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dailyRevenue);
            $em->flush();

            return $this->redirectToRoute('dailyrevenue_show', array('id' => $dailyRevenue->getId()));
        }

        return $this->render('waiter/dailyrevenue/new.html.twig', array(
            'dailyRevenue' => $dailyRevenue,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a dailyRevenue entity.
     *
     * @Route("/{id}", name="dailyrevenue_show")
     * @Method("GET")
     */
    public function showAction(DailyRevenue $dailyRevenue)
    {
        $deleteForm = $this->createDeleteForm($dailyRevenue);

        return $this->render('waiter/dailyrevenue/show.html.twig', array(
            'dailyRevenue' => $dailyRevenue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dailyrevenue entity.
     *
     * @Route("/{id}/edit", name="dailyrevenue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DailyRevenue $dailyRevenue)
    {
        $deleteForm = $this->createDeleteForm($dailyRevenue);
        $editForm = $this->createForm('AppBundle\Form\DailyRevenueType', $dailyRevenue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dailyrevenue_edit', array('id' => $dailyRevenue->getId()));
        }

        return $this->render('dailyrevenue/edit.html.twig', array(
            'dailyRevenue' => $dailyRevenue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dailyrevenue entity.
     *
     * @Route("/{id}", name="dailyrevenue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DailyRevenue $dailyRevenue)
    {
        $form = $this->createDeleteForm($dailyRevenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dailyRevenue);
            $em->flush();
        }

        return $this->redirectToRoute('dailyrevenue_index');
    }

    /**
     * Creates a form to delete a dailyrevenue entity.
     *
     * @param DailyRevenue $dailyRevenue The dailyrevenue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DailyRevenue $dailyRevenue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dailyrevenue_delete', array('id' => $dailyRevenue->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

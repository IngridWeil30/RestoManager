<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/6/18
 * Time: 2:10 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\TipsRevenue;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * TipsRevenueRepository controller.
 *
 * @Route("waiter/tipsrevenue")
 */

class TipsRevenueController extends Controller
{
    /**
     * Lists all tipsRevenue entities.
     *
     * @Route("/", name="tipsrevenue_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dishes = $em->getRepository('AppBundle:Dish')->findAll();
        $tipsRevenues = $em->getRepository('AppBundle:TipsRevenue')->findAll();
        $tipAmount = 0;
        //$tipAmount1 = 0;
        $tipsRevenue = new TipsRevenue();
        $tipsRevenue_form = $this->createForm('AppBundle\Form\TipsRevenueType', $tipsRevenue);
        $tipsRevenue_form->handleRequest($request);

        if ($tipsRevenue_form->isSubmitted() && $tipsRevenue_form->isValid()) {
            //$tipAmount = $tipsRevenue->getInputRevenue();
            //var_dump($tipAmount);
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipsRevenue);
            $em->flush();
        }


        return $this->render('waiter/tipsrevenue/index.html.twig', array(
            'tipsRevenues' => $tipsRevenues,
            'dishes' => $dishes,
            'tipAmount' => $tipAmount,
            'tipsRevenue_form' => $tipsRevenue_form->createView(),
        ));
    }

    /**
     * Creates a new tipsRevenue entity.
     *
     * @Route("/new", name="tipsrevenue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipsRevenue = new TipsRevenue();
        $form = $this->createForm('AppBundle\Form\TipsRevenueType', $tipsRevenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipsRevenue);
            $em->flush();

            return $this->redirectToRoute('tipsrevenue_show', array('id' => $tipsRevenue->getId()));
        }

        return $this->render('waiter/tipsrevenue/new.html.twig', array(
            'tipsRevenue' => $tipsRevenue,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a tipsRevenue entity.
     *
     * @Route("/{id}", name="tipsrevenue_show")
     * @Method("GET")
     */
    public function showAction(TipsRevenue $tipsRevenue)
    {
        $deleteForm = $this->createDeleteForm($tipsRevenue);

        return $this->render('waiter/tipsrevenue/show.html.twig', array(
            'tipsRevenue' => $tipsRevenue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipsrevenue entity.
     *
     * @Route("/{id}/edit", name="tipsrevenue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipsRevenue $tipsRevenue)
    {
        $deleteForm = $this->createDeleteForm($tipsRevenue);
        $editForm = $this->createForm('AppBundle\Form\TipsRevenueType', $tipsRevenue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipsrevenue_edit', array('id' => $tipsRevenue->getId()));
        }

        return $this->render('tipsrevenue/edit.html.twig', array(
            'tipsRevenue' => $tipsRevenue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipsrevenue entity.
     *
     * @Route("/{id}", name="tipsrevenue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipsRevenue $tipsRevenue)
    {
        $form = $this->createDeleteForm($tipsRevenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipsRevenue);
            $em->flush();
        }

        return $this->redirectToRoute('tipsrevenue_index');
    }

    /**
     * Creates a form to delete a tipsrevenue entity.
     *
     * @param TipsRevenue $tipsRevenue The tipsrevenue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipsRevenue $tipsRevenue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipsrevenue_delete', array('id' => $tipsRevenue->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

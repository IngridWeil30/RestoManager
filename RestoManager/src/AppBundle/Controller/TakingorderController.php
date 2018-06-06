<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/6/18
 * Time: 2:10 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Takingorder controller.
 *
 * @Route("waiter/takingorder")
 */

class TakingorderController extends Controller
{
    /**
     * Lists all takingorder entities.
     *
     * @Route("/", name="takingorder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dishes = $em->getRepository('AppBundle:Dish')->findAll();

        return $this->render('waiter/takingorder/index.html.twig', array(
            'dishes' => $dishes,
        ));
    }
}

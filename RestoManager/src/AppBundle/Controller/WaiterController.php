<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/4/18
 * Time: 4:50 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Waiter controller.
 *
 * @Route("waiter")
 */

class WaiterController extends Controller
{
    /**
     * Lists all waiter entities.
     *
     * @Route("/", name="waiter_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        /*        $em = $this->getDoctrine()->getManager();

                $users = $em->getRepository('AppBundle:User')->findAll();*/

        return $this->render('waiter/index.html.twig');
    }

}




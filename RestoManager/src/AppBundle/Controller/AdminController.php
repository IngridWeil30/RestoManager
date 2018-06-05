<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/4/18
 * Time: 3:15 PM
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Admin controller.
 *
 * @Route("admin")
 */

class AdminController extends Controller
{
    /**
     * Lists all admin entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dishes = $em->getRepository('AppBundle:Dish')->findAll();

        return $this->render('admin/index.html.twig', array(
            'dishes' => $dishes,
        ));
    }

}




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
 * Justlogged controller.
 *
 * @Route("justlogged")
 */

class JustloggedController extends Controller
{
    /**
     * Lists all justlogged entities.
     *
     * @Route("/", name="justlogged_index")
     * @Method("GET")
     */
    public function indexAction()
    {
/*        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();*/

        if ($this->get('security.authorization_checker')->isGranted('ROLE_MANAGER')) {
            return $this->redirectToRoute('admin_index');
        }
        else {
            return $this->redirectToRoute('waiter_index');
        }
    }

}




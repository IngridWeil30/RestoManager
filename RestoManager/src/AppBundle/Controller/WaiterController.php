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
use Symfony\Component\PropertyAccess\PropertyAccess;

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
        $em = $this->getDoctrine()->getManager();

        //$users = $em->getRepository('AppBundle:User')->findAll();
        $dishes = $em->getRepository('AppBundle:Dish')->findAll();

        $employees = $em->getRepository('AppBundle:User')->findAllWaiters();
        $employee_month = $employees[array_rand($employees)];

        $propertyAccessor = PropertyAccess::createPropertyAccessor();
        $id_employee_month = ($propertyAccessor->getValue($employee_month, 'id'));
        $username_employee_month = ($propertyAccessor->getValue($employee_month, 'username'));
        $img_employee_month = ($propertyAccessor->getValue($employee_month, 'urlimage'));

        return $this->render('waiter/index.html.twig', array(
            'dishes' => $dishes,

            'employee_month' => $employee_month,
            'id_employee_month' => $id_employee_month,
            'username_employee_month' => $username_employee_month,
            'img_employee_month' => $img_employee_month
            //'users' => $users,
        ));
    }

}
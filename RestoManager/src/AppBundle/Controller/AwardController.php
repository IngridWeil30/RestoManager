<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/6/18
 * Time: 11:15 AM
 */

namespace AppBundle\Controller;

/**
 * Award controller.
 *
 * @Route("waiter/award")
 */

use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\PropertyAccess\PropertyAccess;


class AwardController extends Controller
{
    /**
     * Lists all award entities.
     *
     * @Route("/", name="award_index")
     * @Method("GET")
     */

    public function indexAction()
    {
//        $em = $this->getDoctrine()->getManager();
//        $employees = $em->getRepository('AppBundle:User')->findAllWaiters();
//        $employee_month = $employees[array_rand($employees)];
//
//        $propertyAccessor = PropertyAccess::createPropertyAccessor();
//        $id_employee_month = ($propertyAccessor->getValue($employee_month, 'id'));
//        $username_employee_month = ($propertyAccessor->getValue($employee_month, 'username'));
//        $img_employee_month = ($propertyAccessor->getValue($employee_month, 'urlimage'));
//        return $this->render('waiter/award/index.html.twig', array(
//            'employee_month' => $employee_month,
//            'id_employee_month' => $id_employee_month,
//            'username_employee_month' => $username_employee_month,
//            'img_employee_month' => $img_employee_month
//
//        ));
    }
}

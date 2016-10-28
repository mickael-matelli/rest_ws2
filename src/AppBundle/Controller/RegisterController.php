<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;

class RegisterController extends Controller
{

    /**
     * @Route("/register", name="homepage_create_account")
     */
    public function indexAction(Request $request)
    {
        $oUserType = new UserType();
        $form = $this->createForm($oUserType);
        if ($request->getMethod() == "POST") {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $user = $form->getData();
                $encorder = $this->get('security.password_encoder');
                $password = $encorder->encodePassword($user, $user->getPassword());
                $role = $user->getRole();
                $em = $this->getDoctrine()->getManager();
                $em->persist($role);
                $user->setRole($role);
                $user->setPassword($password);
                $em->persist($user);
                $em->flush();
            }
        }

        return $this->render("AppBundle:register:create.html.twig", array("form" => $form->createView()));
    }

}

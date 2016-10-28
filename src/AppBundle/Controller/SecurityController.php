<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserType;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{

    public function loginAction()
    {

        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('homepage'));
        }
        if ($this->getRequest()->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->getRequest()->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->getRequest()->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                'AppBundle:security:login.html.twig', array(
                'last_username' => $this->getRequest()->getSession()->get(SecurityContext::LAST_USERNAME),
                'error' => $error,
                )
        );
    }

}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="landing")
     * @return Response
     */
    public function index()
    {
        return $this->render('landing/landing.html.twig');
    }

    /**
     * @Route("/home", name="home")
     * @return Response
     */
    public function home()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('home/home.html.twig');
    }

// @Security("is_granted('ROLE_ADMIN')")


}
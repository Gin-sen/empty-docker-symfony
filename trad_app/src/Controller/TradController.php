<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TradController extends AbstractController
{
    /**
     * @Route("/trad", name="trad")
     */
    public function index(): Response
    {
        return $this->render('trad/index.html.twig', [
            'controller_name' => 'TradController',
        ]);
    }
}

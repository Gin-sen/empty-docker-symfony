<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $a = 'prout salut';

        return new Response(
            '<html lang="en"><body>Hello '.$a.' !</body></html>'
        );
    }
}
<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
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
    public function home(ProjectRepository $projectRepository) : Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $my_projects = $projectRepository->findByUserIdField($this->getUser());
        return $this->render('home/home.html.twig', [
            'my_projects' => $my_projects,
        ]);
    }

// @Security("is_granted('ROLE_ADMIN')")


}
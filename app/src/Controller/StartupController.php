<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StartupController extends AbstractController
{
    /**
     * @Route("/", name="startup")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}

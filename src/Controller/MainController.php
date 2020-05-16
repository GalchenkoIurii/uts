<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [

        ]);
    }

    /**
     * @Route("/companies", name="companies")
     */
    public function companies()
    {
        return $this->render('main/companies.html.twig', [

        ]);
    }
}

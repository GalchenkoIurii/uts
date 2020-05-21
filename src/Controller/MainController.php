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

    /**
     * @Route("/news", name="news")
     */
    public function news()
    {
        return $this->render('main/news.html.twig', [

        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts()
    {
        return $this->render('main/contacts.html.twig', [

        ]);
    }
}

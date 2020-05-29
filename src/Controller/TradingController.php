<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TradingController extends AbstractController
{
    /**
     * @Route("/trading", name="trading")
     */
    public function index()
    {
        return $this->render('trading/index.html.twig', [
            'controller_name' => 'TradingController',
        ]);
    }
}

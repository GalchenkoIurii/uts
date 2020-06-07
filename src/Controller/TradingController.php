<?php

namespace App\Controller;

use App\Entity\Lot;
use App\Form\LotType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TradingController extends AbstractController
{
    /**
     * @Route("/trading", name="trading")
     */
    public function index()
    {

        return $this->render('trading/index.html.twig', [
        ]);
    }

    /**
     * @Route("/trading/add", name="add_lot")
     */
    public function add(Request $request)
    {
        $lot = new Lot();
        $form = $this->createForm(LotType::class, $lot);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lot);
            $entityManager->flush();


//            placement_date
//            expiration_date
//            current_price
//            user


            return $this->redirectToRoute('lot_added');
        }

        return $this->render('trading/add.html.twig', [
            'lotForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/trading/added", name="lot_added")
     */
    public function added()
    {
        return $this->render('trading/added.html.twig', [
        ]);
    }
}

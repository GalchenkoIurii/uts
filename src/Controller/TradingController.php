<?php

namespace App\Controller;

use App\Entity\Lot;
use App\Form\LotType;
use App\Repository\LotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TradingController extends AbstractController
{
    /**
     * @Route("/trading", name="trading")
     */
    public function index(LotRepository $lotRepository)
    {
        $lots = $lotRepository->findLotsDesc();

        return $this->render('trading/index.html.twig', [
            'lots' => $lots
        ]);
    }

    /**
     * @Route("/trading/{id}", name="show_lot")
     */
    public function showLot($id, LotRepository $lotRepository)
    {
        $lot = $lotRepository->find($id);

        return $this->render('trading/lot.html.twig', [
            'lot' => $lot
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
            $lot->setPlacementDate(new \DateTime());

            $expirationDate = new \DateTime();
            $lot->setExpirationDate($expirationDate->modify('+24 hours'));

            $lot->setCurrentPrice($lot->getStartPrice());
            $lot->setEndPrice($lot->getStartPrice());
            $lot->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lot);
            $entityManager->flush();


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

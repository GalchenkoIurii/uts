<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\Region;
use App\Form\CountryType;
use App\Form\RegionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
        ]);
    }

    /**
     * @Route("/admin/country", name="add_country")
     */
    public function addCountry(Request $request)
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($country);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/country.html.twig', [
            'countryForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/region", name="add_region")
     */
    public function addRegion(Request $request)
    {
        $region = new Region();
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/region.html.twig', [
            'regionForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/added", name="data_added")
     */
    public function added()
    {
        return $this->render('admin/added.html.twig');
    }
}

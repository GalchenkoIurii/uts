<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\Currency;
use App\Entity\Region;
use App\Entity\Subcategory;
use App\Form\CategoryType;
use App\Form\CityType;
use App\Form\CountryType;
use App\Form\CurrencyType;
use App\Form\RegionType;
use App\Form\SubcategoryType;
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
     * @Route("/admin/city", name="add_city")
     */
    public function addCity(Request $request)
    {
        $city = new City();
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($city);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/city.html.twig', [
            'cityForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/category", name="add_category")
     */
    public function addCategory(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/category.html.twig', [
            'categoryForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/subcategory", name="add_subcategory")
     */
    public function addSubcategory(Request $request)
    {
        $subcategory = new Subcategory();
        $form = $this->createForm(SubcategoryType::class, $subcategory);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subcategory);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/subcategory.html.twig', [
            'subcategoryForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/currency", name="add_currency")
     */
    public function addCurrency(Request $request)
    {
        $currency = new Currency();
        $form = $this->createForm(CurrencyType::class, $currency);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currency);
            $entityManager->flush();

            return $this->redirectToRoute('data_added');
        }

        return $this->render('admin/currency.html.twig', [
            'currencyForm' => $form->createView(),
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

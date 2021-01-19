<?php

namespace App\Controller;

use App\Entity\CAtegorie;
use App\Form\CAtegorieType;
use App\Repository\CAtegorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/c/ategorie")
 */
class CAtegorieController extends AbstractController
{
    /**
     * @Route("/", name="c_ategorie_index", methods={"GET"})
     */
    public function index(CAtegorieRepository $cAtegorieRepository): Response
    {
        return $this->render('c_ategorie/index.html.twig', [
            'c_ategories' => $cAtegorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="c_ategorie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cAtegorie = new CAtegorie();
        $form = $this->createForm(CAtegorieType::class, $cAtegorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cAtegorie);
            $entityManager->flush();

            return $this->redirectToRoute('c_ategorie_index');
        }

        return $this->render('c_ategorie/new.html.twig', [
            'c_ategorie' => $cAtegorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="c_ategorie_show", methods={"GET"})
     */
    public function show(CAtegorie $cAtegorie): Response
    {
        return $this->render('c_ategorie/show.html.twig', [
            'c_ategorie' => $cAtegorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="c_ategorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CAtegorie $cAtegorie): Response
    {
        $form = $this->createForm(CAtegorieType::class, $cAtegorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('c_ategorie_index');
        }

        return $this->render('c_ategorie/edit.html.twig', [
            'c_ategorie' => $cAtegorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="c_ategorie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CAtegorie $cAtegorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cAtegorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cAtegorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('c_ategorie_index');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjouterAppartementType;
use App\Repository\ImmeubleRepository;
use App\Repository\CategorieRepository;
use App\Entity\Immeuble;
use App\Entity\Categorie;
use App\Entity\Appartement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AppartementController extends AbstractController
{
    #[Route('/ajoutAppartement', name: 'app_ajoutappartement')]
    public function ajouterAppartement(Request $request, ImmeubleRepository $ImmeubleRepository, CategorieRepository $CategorieRepository, EntityManagerInterface $em): Response
    {
        $appartement = new Appartement();
        $form = $this->createForm(AjouterAppartementType::class, $appartement);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $categorie = $form->get('categorie')->getData();
                $immeuble = $form->get('immeuble')->getData();
                $c = $CategorieRepository->find($categorie);
                $i = $ImmeubleRepository->find($immeuble);
                $appartement -> setCategorie($c);                            
                $appartement -> setImmeuble($i);                            

                $em->persist($appartement);
                $em->flush();
                $this->addFlash('notice', 'Appartement créé');
                return $this->redirectToRoute('app_ajoutappartement');
            }
        }
        return $this->render('appartement/ajoutAppartement.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

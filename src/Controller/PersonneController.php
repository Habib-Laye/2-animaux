<?php

namespace App\Controller;

use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonneRepository;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function index(PersonneRepository $repository)
    {
        $personnes = $repository->findAll();
        return $this->render('personne/personnes.html.twig',[
            "personnes" => $personnes
        ]);
    }

    /**
     * @Route("/personne/{id}", name="afficher_personne")
     */
    public function afficherPersonne(Personne $personne)
    {
        return $this->render('personne/afficherPersonne.html.twig',[
            "personne" => $personne
        ]);
    }
}

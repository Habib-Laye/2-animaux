<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnimalRepository;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animaux")
     */
  /*  public function index()
    {
        //Récupérer les informations au niveau de la base de données
        $repository = $this->getDoctrine()->getRepository(Animal::class);
        $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig',[
            "animaux" => $animaux
        ]);
    }
    */
    
    //Deuxième méthode injection de dépendence

    /**
     * @Route("/", name="animaux")
     */
    public function index(AnimalRepository $repository)
    {
        
         $animaux = $repository->findAll();
        
        return $this->render('animal/index.html.twig',[
            "animaux" => $animaux
        ]);
    }

    /**
     * @Route("/animal/{id}", name="afficher_animal")
     */
    public function afficherAnimal(AnimalRepository $repository, $id)
    {
        $animal = $repository->find($id) ; 
        return $this->render('animal/afficherAnimal.html.twig',[
            "animal" => $animal
        ]);
    }


}

<?php

namespace App\Controller;

use App\Entity\Format;
use App\Repository\FormatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormatController extends AbstractController
{
    #[Route('/format', name: 'app_format')]
    public function index(FormatRepository $format): Response
    {
        return $this->render('format/format.html.twig', [
            'title' => 'Les formats diponibles',//on donne un nom à la page
            'formats'=> $format->findAll(),//on utilise la classe Format et findAll pour appeler toutes les classes
        ]);
    }
    //on a rajouté un paramètre entre accolade.
    #[Route('/format/{name}', name: 'app_format_show')]
    //on utilise la classe Format car on ne veut afficher qu'un seul livre.
    public function show(Format $format): Response
    {
        return $this->render('format/show.html.twig', [
            'title' => 'le format :',//on donne un nom à la page
            'format'=> $format,//on utilise la classe Format et findAll pour appeler toutes les classes
        ]);
    }
    #[Route('/format/delete/{name}', name: 'app_format_delete')]
    //on utilise la classe Format car on ne veut afficher qu'un seul livre.
    public function delete(
        Format $format,
        //on utilise une classe globale Enttuty Manager Interface et par habitude on appelle $em la variable
        EntityManagerInterface $em): Response
    {
        $em->remove($format);
        //flush est obligatoire pour toute action en lien avec la BDD. on le place tout le temps
        $em->flush();
        //on redirige vers une autre route
        return $this->redirectToRoute('app_format');

    }
}

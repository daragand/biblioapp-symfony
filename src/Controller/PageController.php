<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page')]
    public function index(BookRepository $books): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'Page',
            'books'=>$books->findBy(
                [],// Where
                ['id'=>'DESC'],//Ordonner par
                10 //limiter à 
            ),
        ]);
    }
    #[Route('/contact', name: 'app_contact', methods:['GET','POST'])]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}

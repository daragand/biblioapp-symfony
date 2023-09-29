<?php

namespace App\Controller;

use App\Form\ContactType;
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
    public function contact(
        ContactType $form,
        ): Response
    {
        //on récupère la classe de l'élément à savoir le contact
        $form = $this->createForm(ContactType::class);
        
        return $this->render('page/contact.html.twig', [
            'contact' => $form,
        ]);
    }
}

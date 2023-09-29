<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
        Request $request, 
        MailerInterface $mailer
        ): Response
    {
        //on récupère la classe de l'élément à savoir le contact
        $form = $this->createForm(ContactType::class);


//on réceptionne les données du formulaire avec Request
        $form->handleRequest($request);

// si le formulaire est soumis et valide alors ...
if ($form->isSubmitted() && $form->isValid()) {
    # code...
    
    // on récupère les données du formulaire pour les placer dans le mail
    $name = $form->get('name')->getData();
    $email = $form->get('email')->getData();
    $subject = $form->get('sujet')->getData();
    $message = $form->get('message')->getData();

    // dd($name,$email,$subject,$messsage);
    
    // on instancie un nouveau mail 
    
    // On paramètre le mail 
    
    $mail = (new Email())
        ->from($email)
        ->to('contact@biblioapp.fr')
        ->priority(Email::PRIORITY_HIGH)
        ->subject($subject)
        ->html('<div>Vous avez reçu le message suivant de ' . $name . '.<br> Contenu : <br>'. $message. '</div>'
);
    // On envoie le mail
    $mailer->send($mail);
    
    // On informe l'utilisateur
    
    $this->addFlash('success', 'Votre message a bien été envoyé');
}














        return $this->render('page/contact.html.twig', [
            'contact' => $form,
        ]);
    }
}

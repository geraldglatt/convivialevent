<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, EntityManagerInterface $manager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $contact = $form->getData();

            $manager->persist($contact);

            $manager->flush();

            $email = (new Email())
                ->from($contact->getEmail())
                ->to('toto@toto.fr')
                ->subject($contact->getMessage())
                ->text('kkk');
                

            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre demande a bien été envoyé !'
            );

            return $this->redirectToRoute('app_contact', [], 301);

        }

        return $this->renderForm('contact/contact.html.twig', [
            'form' => $form,
        ]);
    }
}

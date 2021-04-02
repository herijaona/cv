<?php

namespace App\Controller;

use App\Entity\Employer;
use App\Entity\Candidate;
use App\Form\EmployerType;
use App\Entity\Utilisateur;
use App\Form\CandidateType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('app_profile');
        }


        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    /**
     * @Route("/inscription", name="app_inscription", methods={"GET", "POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $manager)
    {
        $formCandidate = $this->createForm(CandidateType::class);
        $formCandidate->handleRequest($request);
        if ($formCandidate->isSubmitted() && $formCandidate->isValid()) {
            $data = $formCandidate->getData();

            //Pérmet d'ajouter les donées dans l'entite Utilisateurs
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail($data['email']);
            $utilisateur->setPassword($encoder->encodePassword($utilisateur, $data['password']));
            $utilisateur->setRoles(['ROLE_USER', 'ROLE_CANDIDATE']);
            $utilisateur->setUpdatedAt(new \DateTime());
            $utilisateur->setCreatedAt(new \DateTime());



            //Pérmet d'ajouter les donnée dans l'entite Candidate
            $Candidate = new Candidate();
            $Candidate->setNom($data['nom']);
            $Candidate->setPrenom($data['prenom']);
            $Candidate->setTelephone($data['telephone']);
            $Candidate->setSexe($data['sexe']);
            $Candidate->setAdresse($data['adresse']);
            $Candidate->setUtilisateur($utilisateur);
            $Candidate->setCreatedAt(new \DateTime());
            //Pérmet d'envoier Candidate dans la base de donnée
            $manager->persist($Candidate);
            $manager->flush();
            //Pérmet de redirectionner vers la page de login
            return $this->redirectToRoute('app_login');
        }

        $formEmployer = $this->createForm(EmployerType::class);
        $formEmployer->handleRequest($request);
        if ($formEmployer->isSubmitted() && $formEmployer->isValid()) {
            $data = $formEmployer->getData();

            //Pérmet d'ajouter les donnée dans l'entite utilisateur
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail($data['email']);
            $utilisateur->setPassword($encoder->encodePassword($utilisateur, $data['password']));
            $utilisateur->setRoles(['ROLE_USER', 'ROLE_EMPLOYER']);
            $utilisateur->setCreatedAt(new \DateTime());
            $utilisateur->setUpdatedAt(new \DateTime());

            //Pérmet d'ajouter les donnée dans l'entite Employer
            $Employer = new Employer();
            $Employer->setNom($data['nom']);
            $Employer->setPrenom($data['prenom']);
            $Employer->setTelephone($data['telephone']);
            $Employer->setSexe($data['sexe']);
            $Employer->setAdresse($data['adresse']);
            $Employer->setUtilisateur($utilisateur);
            $Employer->setCreatedAt(new \DateTime());
            //Pérmet d'envoier Employer dans la base de donnée
            $manager->persist($Employer);
            $manager->flush();
            //Pérmet de redirectionner vers la page de login
            return $this->redirectToRoute('app_login');
        }

        return $this->render('inscription/inscription.html.twig', [
            "CandidateForm" =>  $formCandidate->createView(),
            "EmployerForm" => $formEmployer->createView()
        ]);
    }
}

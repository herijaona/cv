<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Repository\EmployerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/candidate", name="Candidate_profile")
     */
    public function CandidateProfile(CandidateRepository $candidateRepo): Response
    {
        //dd($this->getUser()->getId());
        $Candidate = $candidateRepo->findByUtilisateurId($this->getUser()->getId());
        return $this->render('profile/candidate.html.twig', [
            'Candidate' => $Candidate
        ]);
    }

    /**
     * @Route("/profile/Employer", name="Employeur_profile")
     */
    public function Employer(EmployerRepository $employerRepo): Response
    {
        $Employer = $employerRepo->findByUtilisateurId($this->getUser()->getId());
        return $this->render('profile/employer.html.twig', [
            'Employer' => $Employer
        ]);
    }
}

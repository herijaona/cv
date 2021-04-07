<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function Accueil(CandidateRepository $candidateRepository, JobController $jobController): Response
    {
        //Pérmet de trouver les Candidate Niveau Sénior
        $CandidateSenior = $candidateRepository->findBy(['Niveau' => 'Senior']);


        return $this->render('accueil/accueil.html.twig', [
            'CandidateSeniors' => $CandidateSenior
        ]);
    }
}

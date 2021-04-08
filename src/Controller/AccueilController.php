<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use App\Repository\JobRepository;
use DateInterval;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function Accueil(CandidateRepository $candidateRepository, JobRepository $jobRepository): Response
    {
        //Pérmet de trouver les Candidate Niveau Sénior
        $CandidateSenior = $candidateRepository->findBy(['Niveau' => 'Senior']);

        //Pérmet de trouver les job grace a sa date de créations
        /*
        $Maintenant = new \DateTimeImmutable();
        $date = $Maintenant->modify('-1 month');

        $interval = date_diff($Maintenant, $date);
        $tableau = [$Maintenant, $date];
        //$JobAjours = $jobRepository->findBy(['CreatedAt' => $tableau]);
        //dd($JobAjours);
        */



        return $this->render('accueil/accueil.html.twig', [
            'CandidateSeniors' => $CandidateSenior
        ]);
    }
}

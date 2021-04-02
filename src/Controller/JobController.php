<?php

namespace App\Controller;

use App\Repository\EmployerRepository;
use App\Repository\JobRepository;
use App\Repository\SocieteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * @Route("/job/list", name="job_list")
     */
    public function list(JobRepository $jobRepository, Request $request, PaginatorInterface $paginator, SocieteRepository $societeRepo): Response
    {
        //Pérmet de trouver touts les Jobs
        $données = $jobRepository->findAll();
        //Pérmet de affiche la paginations
        $Employes = $paginator->paginate($données, $request->query->getInt('page', 1), 4);


        return $this->render('Jobs/joblists.html.twig', [
            'Employes' => $Employes
        ]);
    }

    /**
     * @Route("/job/{id}", name="job_detail")
     */
    public function detail($id, JobRepository $jobRepo, SocieteRepository $societeRepo): Response
    {
        //Pérmet de recuperer le Job grace a son identifiants
        $Job = $jobRepo->find($id);

        dd($Job);

        //Pérmet de recuprer la societe qui publier le Jobs
        $Societe = $societeRepo->findBy(['Employeur' => $user]);



        return $this->render('Jobs/jobdetail.html.twig', [
            'Job' => $Job,
        ]);
    }
}

<?php
namespace App\Controller\Admin;

use App\Entity\CvForm;
use App\Repository\CandidateRepository;
use App\Repository\CvFormRepository;
use App\Repository\EmployerRepository;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController{
   
    /**
     * Pérmet d'affiche espace adminitrateurs
     *
     * @Route("/admin", name="Admin_profile")
     * @return Response
     */
    public function Admin(CandidateRepository $candidateRepo, EmployerRepository $EmpoyeurRepo, CvFormRepository $CvRepo, JobRepository $jobRepo):Response
    {
        //Trouve tout les Candidate
        $Candidates = $candidateRepo->findAll();

        //Trouve tous les Employeurs
        $Employeurs = $EmpoyeurRepo->findAll();

        //Trouve tous les Cvs
        $Cvs = $CvRepo->findAll();

        //Trouve tous les job
        $Jobs = $jobRepo->findAll();


        
        return $this->render('Admin/Admin.html.twig', [
            "toutsCandidates" => $Candidates,
            "toutsEmployeurs" => $Employeurs,
            "tousCvs" => $Cvs, 
            "tousJobs" => $Jobs
        ]);
    }
}
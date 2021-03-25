<?php

namespace App\Controller;

use App\Repository\JobRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * @Route("/job/list", name="Employe_list")
     */
    public function index(JobRepository $jobRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $données = $jobRepository->findAll();
        $Employes = $paginator->paginate($données, $request->query->getInt('page', 1), 4);


        return $this->render('Jobs/joblists.html.twig', [
            'Employes' => $Employes
        ]);
    }
}

<?php

namespace App\Controller;


use App\Repository\CandidateRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidateController extends AbstractController
{
    /**
     * @Route("/Candidate/liste", name="candidate_list")
     */
    public function candidatelist(CandidateRepository $candidateRepo, Request $request, PaginatorInterface $paginator): Response
    {
        $toutesCandidate = $candidateRepo->findAll();
        //Numéro de page encours, 1 pardefault
        $candidat = $paginator->paginate($toutesCandidate, $request->query->getInt('page', 1), 1);

        return $this->render('candidate/candidatelist.html.twig', [
            "lesCandidates" => $candidat
        ]);
    }
    /**
     * @Route("/Candidate/{id}", name="candidate_detail")
     */
    public function candidatedetail($id, CandidateRepository $candidateRepo)
    {
        $candidate = $candidateRepo->find($id);


        return $this->render("candidate/candidatedetail.html.twig", [
            "candidate" => $candidate
        ]);
    }
}

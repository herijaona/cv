<?php

namespace App\Controller;

use App\Entity\CandidatSearch;
use App\Form\CandidateSearchType;
use App\Form\SearchCandidatType;
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
        //Pérmet d'affiche tout les candidate
        $candidats = $candidateRepo->findAll();

        //Numéro de page encours, 1 pardefault
        $candidat = $paginator->paginate($candidats, $request->query->getInt('page', 1), 6);

        //Pérmet de declare un objet vide
        $search = new CandidatSearch();

        //Pérmet d'affiche la formulaire de recherche
        $searchform = $this->createForm(CandidateSearchType::class, $search);
        $searchform->handleRequest($request);

        if ($searchform->isSubmitted() && $searchform->isValid()) {
            //On recherche les candidate aux mots cle

        }

        return $this->render('candidate/candidatelist.html.twig', [
            "Candidates" => $candidat,
            "SearchForm" => $searchform->createView()
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

<?php

namespace App\Controller;

use App\Entity\CandidatSearch;
use App\Form\CandidateSearchType;
use App\Form\SearchCandidatType;
use App\Repository\CandidateRepository;
use App\Repository\CompetencesRepository;
use App\Repository\CvFormRepository;
use App\Repository\EducationsRepository;
use App\Repository\ExperienceRepository;
use App\Repository\FormationsRepository;
use App\Repository\LangueRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
    public function candidatedetail($id, CandidateRepository $candidateRepo, ExperienceRepository $experienceRepository, EducationsRepository $educationsRepository, FormationsRepository $formationsRepository, LangueRepository $langueRepository, CompetencesRepository $competencesRepository)
    {
        $candidate = $candidateRepo->find($id);
        //dd($candidate->getCvForm());

        //Pérmet de cherche la Experience
        $Experiences = $experienceRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet de cherche l'Etuducations
        $Educations = $educationsRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Formations
        $Formations = $formationsRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Langues
        $Langues = $langueRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Comptences
        $Competences = $competencesRepository->findBy(['cvForm' => $candidate->getCvForm()]);


        return $this->render("candidate/candidatedetail.html.twig", [
            "candidate" => $candidate,
            'Experiences' => $Experiences,
            'Educations' => $Educations,
            'Formations' => $Formations,
            'Langues' => $Langues,
            'Competences' => $Competences,
        ]);
    }
    /**
     * @Route("/Candidate/Data/Cv/{id}", name="candidate_telecharger_Cv")
     */
    public function DataCvDonwload($id, CandidateRepository $candidateRepo, ExperienceRepository $experienceRepository, EducationsRepository $educationsRepository, FormationsRepository $formationsRepository, LangueRepository $langueRepository, CompetencesRepository $competencesRepository)
    {
        $candidate = $candidateRepo->find($id);
        //dd($candidate->getCvForm());

        //Pérmet de cherche la Experience
        $Experiences = $experienceRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet de cherche l'Etuducations
        $Educations = $educationsRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Formations
        $Formations = $formationsRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Langues
        $Langues = $langueRepository->findBy(['cvForm' => $candidate->getCvForm()]);
        //Pérmet d'avoir la Comptences
        $Competences = $competencesRepository->findBy(['cvForm' => $candidate->getCvForm()]);

        //On définit les options du PDF
        $pdfOptions = new Options();
        //Choisir un police par défaut       
        $pdfOptions->setDefaultFont('Century Gothic');
        $pdfOptions->setIsRemoteEnabled(true);
        //On instance Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE,
            ]
        ]);
        $dompdf->setHttpContext($context);
        //On genere les HTML
        $html = $this->renderView('candidate/CandidateCvDonload.html.twig', [
            "candidate" => $candidate,
            'Experiences' => $Experiences,
            'Educations' => $Educations,
            'Formations' => $Formations,
            'Langues' => $Langues,
            'Competences' => $Competences,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', "portrait");
        $dompdf->render();

        //On genere un Nom de Fiche
        $ficher = 'CV_' . $candidate->getNom() . ' ' . $candidate->getPrenom() . '.pdf';

        //On envoie les pdf au navigateur
        $dompdf->stream($ficher, [
            'Attachment' => true,
        ]);

        return new Response();
    }  

    /**     
     *  @Route("/create-checkout-session", name="checkout1") 
     */

    public function payment(){

        \Stripe\Stripe::setApiKey('sk_test_51ItRdLEkkK5KiVZbN7Tl94oFK6Kmuy5sKVNB9i46jdaBmuu071DpP4Am6oxiuAw0UmENGMCQjXg8i5tUDungszs700oAbTsT4P');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl("paymment_reussie", [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('payment_erroner', [], UrlGeneratorInterface::ABSOLUTE_URL),
          ]);

        return new JsonResponse([ 'id' => $session->id ]);      

    }
    
    
    /**     
     *  @Route("/success", name="paymment_reussie") 
     */
    public function success(){
        return $this->render('candidate/succes.html.twig');
    }
    /**
     *
     * @Route("/error", name="payment_erroner")   
     */
    public function error(){
        return $this->render('candidate/error.html.twig');
    }
}

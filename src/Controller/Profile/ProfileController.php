<?php

namespace App\Controller\Profile;

use DateTime;
use App\Entity\Job;
use App\Form\JobType;
use App\Entity\CvForm;
use App\Entity\Societe;
use App\Form\LangueType;
use App\Form\SocieteType;
use App\Form\EducationType;
use App\Form\CompetenceType;
use App\Form\ExperienceType;
use App\Form\FormationsType;
use App\Form\EmployerModifType;
use App\Form\CandidateModifType;
use App\Repository\JobRepository;
use App\Repository\CvFormRepository;
use App\Repository\LangueRepository;
use App\Repository\SocieteRepository;
use App\Repository\EmployerRepository;
use App\Repository\CandidateRepository;
use App\Repository\EducationsRepository;
use App\Repository\ExperienceRepository;
use App\Repository\FormationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CompetencesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/candidate", name="Candidate_profile", methods={"GET", "POST"})
     */
    public function CandidateProfile(CandidateRepository $candidateRepo, Request $request, EntityManagerInterface $manager, ExperienceRepository $experienceRepository, CvFormRepository $cvFormRepository, EducationsRepository $educationsRepository, FormationsRepository $formationsRepository, LangueRepository $langueRepository, CompetencesRepository $competencesRepository): Response
    {

        $user = $this->getUser();
        $Candidate = $candidateRepo->findOneBy(['Utilisateur' => $user]);

        //Pérmet de recuperer CV
        $CurriculumVitae = $cvFormRepository->findOneBy(['Candidat' => $Candidate]);


        if ($CurriculumVitae->getId() == null) {
            //Declare un nouveaux CV
            $CurriculumVitae = new CvForm();
            $CurriculumVitae->setCandidat($Candidate);
        }


        $ProfileForm = $this->createForm(CandidateModifType::class, $Candidate);

        $ProfileForm->handleRequest($request);
        if ($ProfileForm->isSubmitted() && $ProfileForm->isValid()) {
            $Candidate->setUpdateAt(new DateTime());
            $manager->flush();
        }


        //Pérmet d'affiche la formulaire d'ajout de Experiences
        $ExpForm = $this->createForm(ExperienceType::class);
        //Pérmet d'analiser la requete
        $ExpForm->handleRequest($request);
        if ($ExpForm->isSubmitted() && $ExpForm->isValid()) {
            $data = $ExpForm->getData();
            $data->setCvForm($CurriculumVitae);
            $manager->persist($data);
            $manager->flush();
        }
        //Pérmet d'affiche la list de Experience
        $Expencelist = $experienceRepository->findBy(["cvForm" => $CurriculumVitae]);

        //Pérmet d'affiche la formulaire d'ajout de Experiences
        $EducationForm = $this->createForm(EducationType::class);
        //Pérmet d'analyser la requete
        $EducationForm->handleRequest($request);
        if ($EducationForm->isSubmitted() && $EducationForm->isValid()) {
            $data = $EducationForm->getData();
            $data->setCvForm($CurriculumVitae);
            $manager->persist($data);
            $manager->flush();
        }
        //Pérmet d'affiche la list de Etude
        $Etude = $educationsRepository->findBy(["cvForm" => $CurriculumVitae]);

        //Pérmet d'affiche la formulaire d'ajout de Formations
        $FormationsForm = $this->createForm(FormationsType::class);
        //Pérmet d'analyser la requete
        $FormationsForm->handleRequest($request);
        if ($FormationsForm->isSubmitted() && $FormationsForm->isValid()) {
            $data = $FormationsForm->getData();
            $data->setCvForm($CurriculumVitae);
            $manager->persist($data);
            $manager->flush();
        }
        //Pérmet d'affiche la list de Formations
        $Formationlist = $formationsRepository->findBy(["cvForm" => $CurriculumVitae]);

        //Pérmet d'affiche la formulaire d'ajout de Langues
        $langueForm = $this->createForm(LangueType::class);
        //Pérmet d'analyser la requete
        $langueForm->handleRequest($request);
        if ($langueForm->isSubmitted() && $langueForm->isValid()) {
            $data = $langueForm->getData();
            $data->setCvForm($CurriculumVitae);
            $manager->persist($data);
            $manager->flush();
        }
        //Pérmet d'affiche la list de Langues
        $LanguesList = $langueRepository->findBy(["cvForm" => $CurriculumVitae]);

        //Pérmet d'affiche la formulaire d'ajout de Comptences
        $ComptenceForm = $this->createForm(CompetenceType::class);
        //Pérmet d'analyser la requete
        $ComptenceForm->handleRequest($request);
        if ($ComptenceForm->isSubmitted() && $ComptenceForm->isValid()) {
            $data = $ComptenceForm->getData();
            $data->setCvForm($CurriculumVitae);
            $manager->persist($data);
            $manager->flush();
        }
        //Pérmet d'affiche la list de Compences
        $CompetencesList = $competencesRepository->findBy(["cvForm" => $CurriculumVitae]);



        return $this->render('profile/candidate.html.twig', [
            'Candidate' => $Candidate,
            'Experiencelist' => $Expencelist,
            'Educationlist' => $Etude,
            'Formationlist' => $Formationlist,
            'languelist' => $LanguesList,
            'Comptencelist' => $CompetencesList,
            'ProfileForm' => $ProfileForm->createView(),
            'Expform' => $ExpForm->createView(),
            'Educationform' => $EducationForm->createView(),
            'Formationform' => $FormationsForm->createView(),
            'LangueForm' => $langueForm->createView(),
            'CompetencesForm' => $ComptenceForm->createView()
        ]);
    }

    /**
     * @Route("/profile/Employer", name="Employeur_profile")
     */
    public function Employer(EmployerRepository $employerRepo, Request $request, EntityManagerInterface $entityManager, JobRepository $jobRepo, SocieteRepository $societeRepository): Response
    {
        $user = $this->getUser();

        $employer = $employerRepo->findOneBy(['Utilisateur' => $user]);

        //Pérmet de Trouves la societe de l'employeur
        $societe = $societeRepository->findOneBy(['Employeur' => $employer]);


        //Pérmet d'avoir la liste de job publier
        $jobliste = $jobRepo->findBy(['employer' => $employer]);


        //Pérmet d'affiche un formulaire job 
        $JobForm = $this->createForm(JobType::class);
        $JobForm->handleRequest($request);
        if ($JobForm->isSubmitted() &&  $JobForm->isValid()) {
            $data = $JobForm->getData();
            //Declare une nouvell job 
            $Job = new Job();
            $Job->setTitre($data["titre"]);
            $Job->setDateExpiration($data["DateExpiration"]);
            $Job->setDescription($data["Description"]);
            $Job->setCategory($data["Category"]);
            $Job->setType($data["Contrat"]);
            $Job->setNiveau($data["Niveau"]);
            $Job->setEmployer($employer);
            $Job->setCreatedAt(new \DateTime());
            $Job->setImageFile($data["imageFile"]);
            $entityManager->persist($Job);
            $entityManager->flush();
            return $this->redirectToRoute('job_detail', ["id" => $Job->getId()]);
        }

        $ProfileForm = $this->createForm(EmployerModifType::class, $employer);
        $ProfileForm->handleRequest($request);
        if ($ProfileForm->isSubmitted() && $ProfileForm->isValid()) {
            $employer->setUpdatedAt(new \DateTime());
            $entityManager->flush();
        }

        //Déclare un nouveau societe
        $societe = new Societe();


        //Pérmet d'affiche formulaire de societe
        $societeForm = $this->createForm(SocieteType::class, $societe);
        $societeForm->handleRequest($request);
        if ($societeForm->isSubmitted() && $societeForm->isValid()) {
            $societe->setEmployeur($employer);
            $entityManager->persist($societe);
            $entityManager->flush();
        }
        return $this->render('profile/employer.html.twig', [
            'Employer' => $employer,
            'JobForms' => $JobForm->createView(),
            'ProfileEmployeur' => $ProfileForm->createView(),
            "Joblist" => $jobliste,
            'SocieteForm' => $societeForm->createView()
        ]);
    }
}

<?php

namespace App\Controller;

use DateTime;
use App\Entity\CvForm;
use App\Entity\Langue;
use App\Entity\Educations;
use App\Entity\Experience;
use App\Entity\Formations;
use App\Entity\Competences;
use function PHPSTORM_META\type;

use App\Repository\EmployerRepository;
use App\Repository\CandidateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/candidate", name="Candidate_profile", methods={"GET", "POST"})
     */
    public function CandidateProfile(CandidateRepository $candidateRepo, Request $request): Response
    {
        $Candidate = $candidateRepo->findByUtilisateurId($this->getUser()->getId());


        return $this->render('profile/candidate.html.twig', [
            'Candidate' => $Candidate,
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

    /**
     * @Route("/cv/inser", name="inser_cv", methods={"POST"})
     */
    public function ajouterCv(Request $request, SerializerInterface $serializer)
    {
        $jsonRecu = json_decode($request->getContent(), true);

        dd($this->getUser());
        $Cv = new CvForm();
        $Cv->setProfile($jsonRecu["profile"]);

        $Experiences = $jsonRecu['experiences'];

        foreach ($Experiences as $Experience) {
            $DateDeDebut = new DateTime($Experience['datedebut']);
            $DateDeFin = new DateTime($Experience['datefin']);
            $this->ajouterExperience($Cv, $Experience['titre'], $Experience['societe'], $DateDeDebut, $DateDeFin, $Experience['description']);
        }
        $Competences = $jsonRecu['competences'];
        foreach ($Competences as $Competence) {
            $this->ajouterCompetence($Cv, $Competence['titre'], $Competence['valeur']);
        }

        $Educations = $jsonRecu['educations'];
        foreach ($Educations as $Education) {
            $DateDeDebut = new DateTime($Education['datedebut']);
            $DateDeFin = new DateTime($Education['datefin']);
            $this->ajouterEducation($Cv, $Education['titre'], $Education['ecole'], $DateDeDebut, $DateDeFin, $Education['description']);
        }


        $Langues = $jsonRecu['langues'];
        foreach ($Langues as $Langue) {
            $this->ajouterLangue($Cv, $Langue['langue'], $Langue['niveau']);
        }

        $Formations = $jsonRecu['formations'];

        foreach ($Formations as $Formation) {
            $DateDeDebut = new DateTime($Formation['dateDebut']);
            $DateDeFin = new DateTime($Formation['dateFin']);
            $this->ajouterFormation($Cv, $Formation['formation'], $Formation['etablissement'], $DateDeDebut, $DateDeFin, $Formation['description']);
        }

        $jsonEnvoier = $serializer->serialize($Cv, "json", ['groups' => "Cv:ecrire"]);



        $response = new JsonResponse($jsonEnvoier, 200, [], true);
        return $response;
    }

    private function ajouterEducation(CvForm $cvForm, $titre, $nomecole, $dateDeDebut, $DateDeFin, $Description)
    {
        $Education = new Educations();
        $Education->setTitre($titre);
        $Education->setNomEcole($nomecole);
        $Education->setDateDeDebut($dateDeDebut);
        $Education->setDateDeFin($DateDeFin);
        $Education->setDescription($Description);
        $Education->setCvForm($cvForm);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($Education);
        $manager->flush();
    }


    private function ajouterExperience(CvForm $cvForm, $titre, $nomsociete, $dateDeDebut, $DateDeFin, $Description)
    {
        $Experience = new Experience();
        $Experience->setTitre($titre);
        $Experience->setNomDeSociete($nomsociete);
        $Experience->setDateDebut($dateDeDebut);
        $Experience->setDateFin($DateDeFin);
        $Experience->setDescription($Description);
        $Experience->setCvForm($cvForm);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($Experience);
        $manager->flush();
    }

    private function ajouterCompetence(CvForm $cvForm, $titre, $valuer)
    {
        $Competence = new Competences();
        $Competence->setTitreDeCompetence($titre);
        $Competence->setValeurPorcentage($valuer);
        $Competence->setCvForm($cvForm);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($Competence);
        $manager->flush();
    }

    private function ajouterLangue(cvForm $cvForm, $langue, $niveau)
    {
        $Langue = new Langue();
        $Langue->setLangue($langue);
        $Langue->setNiveau($niveau);
        $Langue->setCvForm($cvForm);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($Langue);
        $manager->flush();
    }

    private function ajouterFormation(CvForm $cvForm, $formation, $Etablissement, $dateDeDebut, $DateDeFin, $Description)
    {
        $Formation = new Formations();
        $Formation->setFormation($formation);
        $Formation->setEtablissement($Etablissement);
        $Formation->setDateDebut($dateDeDebut);
        $Formation->setDateFin($DateDeFin);
        $Formation->setDescirption($Description);
        $Formation->setCvForm($cvForm);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($Formation);
        $manager->flush();
    }
}

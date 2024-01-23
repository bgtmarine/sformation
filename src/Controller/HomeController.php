<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(FormationRepository $formationRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $formations = $paginator->paginate(
            $formationRepository->findBy([], ['id' => 'DESC']),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('home/index.html.twig', [
            'formations' => $formations,
        ]);

        // $formations = $formationRepository->findAll();
        // return $this->render('home/index.html.twig', [
        //     'formations' => $formationRepository->findAll(),
        // ]);
    }
}

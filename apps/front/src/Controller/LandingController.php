<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingController extends AbstractController
{
    #[Route('/', name: 'app_landing')]
    public function index(): Response
    {
        $greetings = [
            'Welcome welcome !',
            'Its nice to see you again !',
            'Good day to you !',
            'We welcome you again !',
            'Hello to you friend !',
            'Aloha my friend !',
            'Greetings !',
            'Great to see you again !',
        ];

        return $this->render('landing/index.html.twig', [
            'random_greetings' => $greetings[array_rand($greetings)],
        ]);
    }
}

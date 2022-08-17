<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LandingController extends AbstractController
{
    #[Route('/', name: 'app_landing')]
    public function index(HttpClientInterface $client): Response
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

        // We will get a set of names from external API - another container (acting as a microservice)
        $namesResponse = $client->request(
            'GET',
            'http://nginx_api:80/names'
        );

        if ($namesResponse->getStatusCode() === 200) {
            $names = json_decode($namesResponse->getContent());
            sort($names);
        } else {
            $names = [];
        }

        return $this->render('landing/index.html.twig', [
            'random_greetings' => $greetings[array_rand($greetings)],
            'names' => $names
        ]);
    }
}

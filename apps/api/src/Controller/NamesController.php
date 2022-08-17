<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NamesController extends AbstractController
{
    #[Route('/names', name: 'app_names', methods: ['GET'])]
    public function index(): JsonResponse
    {
        // We will simply return an array of several names
        // TODO use database to load the names and return them
        return $this->json([
            'James', 'Simon', 'Maggie', 'Lena', 'Eva',
            'David', 'Hannah', 'Charles', 'Matthew', 'Stuart',
            'Thomas', 'Jeronimo', 'Kevin', 'George', 'Paul',
            'Lucy', 'Nina', 'Nancy', 'Theresa', 'Clara',
        ]);
    }
}

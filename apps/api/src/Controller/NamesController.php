<?php

namespace App\Controller;

use App\Entity\MovieCharacter;
use App\Repository\MovieCharacterRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NamesController extends AbstractController
{
    #[Route('/names', name: 'app_names', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            // Lets fetch the names from the database
            $repo = $entityManager->getRepository(MovieCharacter::class);
            if (
                $repo instanceof MovieCharacterRepository &&
                $characters = $repo->getAllNames()
            ) {
               return $this->json($characters);
            }
            // .. else ..
            return $this->json('Sorry, no movie characters found');

        } catch (Exception $exception) {

            // In case something fails and we are in development ..
            if (strtolower($this->getParameter('app_environment')) == 'dev') {
                return $this->json(['code' => $exception->getCode(), 'status' => $exception->getMessage()]);
            } else {
                // For staging and production environments throw the exception (dont reveal any more details)
                throw $exception;
            }
        }
    }
}
